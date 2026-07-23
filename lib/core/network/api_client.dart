import 'package:dio/dio.dart';

import '../auth/current_user.dart';
import '../auth/session_manager.dart';

class ApiClient {
  ApiClient._() {
    _dio.options = BaseOptions(
      baseUrl: "http://10.0.2.2:8000/api",
      connectTimeout: const Duration(seconds: 20),
      receiveTimeout: const Duration(seconds: 20),
      sendTimeout: const Duration(seconds: 20),

      headers: {
        "Accept": "application/json",
        "Content-Type": "application/json",
      },
    );

    _dio.interceptors.add(
      InterceptorsWrapper(
        onRequest: (options, handler) async {

          final token =
              await SessionManager.instance.getToken();

          if (token != null) {
            options.headers["Authorization"] =
                "Bearer $token";
          }

          handler.next(options);
        },

        onError: (error, handler) {

          if (error.response?.statusCode == 401) {
            CurrentUser.instance.clear();
          }

          handler.next(error);
        },
      ),
    );
  }

  static final ApiClient instance = ApiClient._();

  final Dio _dio = Dio();

  Future<Response> get(
    String url, {
    Map<String, dynamic>? query,
  }) async {
    return await _dio.get(
      url,
      queryParameters: query,
    );
  }

  Future<Response> post(
    String url, {
    dynamic data,
  }) async {
    return await _dio.post(
      url,
      data: data,
    );
  }

  Future<Response> put(
    String url, {
    dynamic data,
  }) async {
    return await _dio.put(
      url,
      data: data,
    );
  }

  Future<Response> delete(
    String url,
  ) async {
    return await _dio.delete(url);
  }
}
