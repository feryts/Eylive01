import 'package:flutter/material.dart';

import '../../../core/widgets/app_text_field.dart';
import '../../../core/widgets/primary_button.dart';
import '../../../shared/main_navigation.dart';
import '../services/auth_service.dart';

class RegisterScreen extends StatefulWidget {
  const RegisterScreen({super.key});

  @override
  State<RegisterScreen> createState() => _RegisterScreenState();
}

class _RegisterScreenState extends State<RegisterScreen> {
  final usernameController = TextEditingController();
  final phoneController = TextEditingController();
  final passwordController = TextEditingController();

  bool loading = false;

  String gender = "male";

  @override
  void dispose() {
    usernameController.dispose();
    phoneController.dispose();
    passwordController.dispose();
    super.dispose();
  }

  Future<void> register() async {
    if (loading) return;

    setState(() {
      loading = true;
    });

    try {
      await AuthService.instance.register(
        username: usernameController.text.trim(),
        phone: phoneController.text.trim(),
        password: passwordController.text,
        gender: gender,
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
          content: Text(e.toString()),
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
      appBar: AppBar(
        title: const Text("Kayıt Ol"),
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(24),
        child: Column(
          children: [
            AppTextField(
              controller: usernameController,
              hint: "Kullanıcı Adı",
              icon: Icons.person,
            ),

            const SizedBox(height: 16),

            AppTextField(
              controller: phoneController,
              hint: "Telefon",
              icon: Icons.phone,
              keyboardType: TextInputType.phone,
            ),

            const SizedBox(height: 16),

            AppTextField(
              controller: passwordController,
              hint: "Şifre",
              icon: Icons.lock,
              obscureText: true,
            ),

            const SizedBox(height: 20),

            DropdownButtonFormField<String>(
              value: gender,
              decoration: InputDecoration(
                labelText: "Cinsiyet",
                border: OutlineInputBorder(
                  borderRadius: BorderRadius.circular(18),
                ),
              ),
              items: const [
                DropdownMenuItem(
                  value: "male",
                  child: Text("Erkek"),
                ),
                DropdownMenuItem(
                  value: "female",
                  child: Text("Kadın"),
                ),
              ],
              onChanged: (value) {
                if (value != null) {
                  setState(() {
                    gender = value;
                  });
                }
              },
            ),

            const SizedBox(height: 30),

            PrimaryButton(
              text: "Kayıt Ol",
              icon: Icons.person_add,
              loading: loading,
              onPressed: register,
            ),
          ],
        ),
      ),
    );
  }
}
