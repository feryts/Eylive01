import 'package:flutter/material.dart';

import '../../../core/widgets/app_text_field.dart';
import '../../../core/widgets/primary_button.dart';

class LoginScreen extends StatefulWidget {
  const LoginScreen({super.key});

  @override
  State<LoginScreen> createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  final TextEditingController phoneController = TextEditingController();

  final TextEditingController passwordController =
      TextEditingController();

  @override
  void dispose() {
    phoneController.dispose();
    passwordController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: Center(
          child: SingleChildScrollView(
            padding: const EdgeInsets.symmetric(horizontal: 24),
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

                const SizedBox(height: 8),

                const Text(
                  "Live Your Voice",
                  style: TextStyle(
                    color: Colors.grey,
                  ),
                ),

                const SizedBox(height: 40),

                AppTextField(
                  controller: phoneController,
                  hint: "Telefon Numarası",
                  icon: Icons.phone_android,
                  keyboardType: TextInputType.phone,
                ),

                const SizedBox(height: 18),

                AppTextField(
                  controller: passwordController,
                  hint: "Şifre",
                  icon: Icons.lock_outline,
                  obscureText: true,
                ),

                const SizedBox(height: 28),

                PrimaryButton(
                  text: "Giriş Yap",
                  icon: Icons.login,
                  onPressed: () {
                    // API bağlantısı burada yapılacak.
                  },
                ),

                const SizedBox(height: 16),

                TextButton(
                  onPressed: () {
                    // Register ekranına yönlendirilecek.
                  },
                  child: const Text(
                    "Hesabın yok mu? Kayıt Ol",
                  ),
                ),

                TextButton(
                  onPressed: () {
                    // Şifremi unuttum ekranı.
                  },
                  child: const Text(
                    "Şifremi Unuttum",
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
