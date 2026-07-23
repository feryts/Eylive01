import 'package:flutter_secure_storage/flutter_secure_storage.dart';

import 'current_user.dart';

class SessionManager {
  SessionManager._();

  static final SessionManager instance = SessionManager._();

  final FlutterSecureStorage _storage =
      const FlutterSecureStorage();

  static const String _tokenKey = 'access_token';

  /*
  |--------------------------------------------------------------------------
  | Token
  |--------------------------------------------------------------------------
  */

  Future<void> saveToken(String token) async {
    await _storage.write(
      key: _tokenKey,
      value: token,
    );

    CurrentUser.instance.token = token;
  }

  Future<String?> getToken() async {
    final token = await _storage.read(
      key: _tokenKey,
    );

    CurrentUser.instance.token = token;

    return token;
  }

  Future<bool> hasSession() async {
    return await getToken() != null;
  }

  Future<void> logout() async {
    await _storage.deleteAll();

    CurrentUser.instance.clear();
  }
}
