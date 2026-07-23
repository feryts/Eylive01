import 'package:flutter/material.dart';

import '../../../core/auth/session_manager.dart';
import '../../../shared/main_navigation.dart';
import '../services/auth_service.dart';
import 'login_screen.dart';

class SplashScreen extends StatefulWidget {
  const SplashScreen({super.key});

  @override
  State<SplashScreen> createState() => _SplashScreenState();
}

class _SplashScreenState extends State<SplashScreen> {
  @override
  void initState() {
    super.initState();
    start();
  }

  Future<void> start() async {
    final hasSession =
        await SessionManager.instance.hasSession();

    if (!mounted) return;

    if (!hasSession) {
      Navigator.pushReplacement(
        context,
        MaterialPageRoute(
          builder: (_) => const LoginScreen(),
        ),
      );
      return;
    }

    try {
      await AuthService.instance.me();

      if (!mounted) return;

      Navigator.pushReplacement(
        context,
        MaterialPageRoute(
          builder: (_) => const MainNavigation(),
        ),
      );
    } catch (_) {
      await SessionManager.instance.logout();

      if (!mounted) return;

      Navigator.pushReplacement(
        context,
        MaterialPageRoute(
          builder: (_) => const LoginScreen(),
        ),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return const Scaffold(
      body: Center(
        child: CircularProgressIndicator(),
      ),
    );
  }
}
