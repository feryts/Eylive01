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

  Future<bool> login({
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

    CurrentUser.instance.fromJson(
      data["user"],
    );

    return true;
  }

  /*
  |--------------------------------------------------------------------------
  | Register
  |--------------------------------------------------------------------------
  */

  Future<bool> register({
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
      data["token"],
    );

    CurrentUser.instance.fromJson(
      data["user"],
    );

    return true;
  }

  /*
  |--------------------------------------------------------------------------
  | Logout
  |--------------------------------------------------------------------------
  */

  Future<void> logout() async {
    try {
      await ApiClient.instance.post("/auth/logout");
    } catch (_) {
      // Sunucuya ulaşılamasa bile yerel oturumu temizle.
    }

    await SessionManager.instance.logout();
  }
}
