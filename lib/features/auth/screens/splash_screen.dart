import 'package:flutter/material.dart';

import '../../../core/auth/session_manager.dart';
import '../../../shared/main_navigation.dart';
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
    checkSession();
  }

  Future<void> checkSession() async {
    final hasSession = await SessionManager.instance.hasSession();

    if (!mounted) return;

    if (hasSession) {
      Navigator.pushReplacement(
        context,
        MaterialPageRoute(
          builder: (_) => const MainNavigation(),
        ),
      );
    } else {
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
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [

            Icon(
              Icons.multitrack_audio,
              size: 90,
              color: Color(0xff6C4DFF),
            ),

            SizedBox(height: 20),

            Text(
              "EyLive",
              style: TextStyle(
                fontSize: 34,
                fontWeight: FontWeight.bold,
              ),
            ),

            SizedBox(height: 30),

            CircularProgressIndicator(),
          ],
        ),
      ),
    );
  }
}
