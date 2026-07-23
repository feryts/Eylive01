import 'package:flutter/material.dart';

import '../../../shared/main_navigation.dart';
import '../services/auth_service.dart';
import '../../../core/widgets/app_text_field.dart';
import '../../../core/widgets/primary_button.dart';

class LoginScreen extends StatefulWidget {
  const LoginScreen({super.key});

  @override
  State<LoginScreen> createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {

  final phoneController = TextEditingController();

  final passwordController = TextEditingController();

  bool loading = false;

  @override
  void dispose() {
    phoneController.dispose();
    passwordController.dispose();
    super.dispose();
  }

  Future<void> login() async {

    if (loading) return;

    setState(() {
      loading = true;
    });

    try {

      await AuthService.instance.login(
        phone: phoneController.text.trim(),
        password: passwordController.text,
      );

      if (!mounted) return;

      Navigator.pushReplacement(
        context,
        MaterialPageRoute(
          builder: (_) => const MainNavigation(),
        ),
      );

    } catch (e) {

      if (!mounted) return;

      ScaffoldMessenger.of(context).showSnackBar(

        SnackBar(
          content: Text(
            e.toString(),
          ),
        ),

      );

    }

    if (mounted) {

      setState(() {
        loading = false;
      });

    }

  }

  @override
  Widget build(BuildContext context) {

    return Scaffold(

      body: SafeArea(

        child: Center(

          child: SingleChildScrollView(

            padding: const EdgeInsets.all(24),

            child: Column(

              children: [

                const Icon(
                  Icons.multitrack_audio,
                  size: 90,
                  color: Color(0xff6C4DFF),
                ),

                const SizedBox(height: 20),

                const Text(
                  "EyLive",
                  style: TextStyle(
                    fontSize: 36,
                    fontWeight: FontWeight.bold,
                  ),
                ),

                const SizedBox(height: 40),

                AppTextField(
                  controller: phoneController,
                  hint: "Telefon",
                  icon: Icons.phone,
                  keyboardType: TextInputType.phone,
                ),

                const SizedBox(height: 18),

                AppTextField(
                  controller: passwordController,
                  hint: "Şifre",
                  icon: Icons.lock,
                  obscureText: true,
                ),

                const SizedBox(height: 28),

                PrimaryButton(
                  text: "Giriş Yap",
                  loading: loading,
                  icon: Icons.login,
                  onPressed: login,
                ),

                const SizedBox(height: 18),

                TextButton(
                  onPressed: () {

                    // Register Screen

                  },
                  child: const Text(
                    "Hesabın yok mu? Kayıt Ol",
                  ),
                ),

              ],

            ),

          ),

        ),

      ),

    );

  }

}
