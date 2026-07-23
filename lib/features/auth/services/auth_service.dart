import '../../../core/auth/current_user.dart';
import '../../../core/auth/session_manager.dart';
import '../../../core/network/api_client.dart';

class AuthService {
  AuthService._();

  static final AuthService instance = AuthService._();

  /*
  |--------------------------------------------------------------------------
  | Login
  |--------------------------------------------------------------------------
  */

  Future<void> login({
    required String phone,
    required String password,
  }) async {
    final response = await ApiClient.instance.post(
      "/auth/login",
      data: {
        "phone": phone,
        "password": password,
      },
    );

    final data = response.data["data"];

    await SessionManager.instance.saveToken(
      data["token"],
    );

    CurrentUser.instance.fromJson(data["user"]);
  }

  /*
  |--------------------------------------------------------------------------
  | Register
  |--------------------------------------------------------------------------
  */

  Future<void> register({
    required String username,
    required String phone,
    required String password,
    required String gender,
    String? country,
  }) async {
    final response = await ApiClient.instance.post(
      "/auth/register",
      data: {
        "username": username,
        "phone": phone,
        "password": password,
        "gender": gender,
        "country": country,
      },
    );

    final data = response.data["data"];

    await SessionManager.instance.saveToken(
      data["token"]);

    CurrentUser.instance.fromJson(data["user"]);
  }

  /*
  |--------------------------------------------------------------------------
  | Me
  |--------------------------------------------------------------------------
  */

  Future<void> me() async {
    final response = await ApiClient.instance.get(
      "/auth/me",
    );

    CurrentUser.instance.fromJson(
      response.data["data"],
    );
  }

  /*
  |--------------------------------------------------------------------------
  | Logout
  |--------------------------------------------------------------------------
  */

  Future<void> logout() async {
    try {
      await ApiClient.instance.post("/auth/logout");
    } catch (_) {}

    await SessionManager.instance.logout();
  }
}
