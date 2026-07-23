import 'package:flutter/material.dart';

class LoginScreen extends StatelessWidget {
  const LoginScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: Padding(
          padding: const EdgeInsets.symmetric(horizontal: 24),
          child: Column(
            children: [

              const Spacer(),

              const Icon(
                Icons.multitrack_audio,
                size: 90,
                color: Color(0xff6C4DFF),
              ),

              const SizedBox(height: 20),

              const Text(
                "EyLive",
                style: TextStyle(
                  fontSize: 38,
                  fontWeight: FontWeight.bold,
                ),
              ),

              const SizedBox(height: 8),

              Text(
                "Live Your Voice",
                style: TextStyle(
                  color: Colors.grey.shade400,
                  fontSize: 16,
                ),
              ),

              const SizedBox(height: 60),

              TextField(
                decoration: InputDecoration(
                  hintText: "Telefon",
                  prefixIcon: const Icon(Icons.phone),
                  filled: true,
                  fillColor: const Color(0xff1B1F2A),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.circular(16),
                    borderSide: BorderSide.none,
                  ),
                ),
              ),

              const SizedBox(height: 16),

              TextField(
                obscureText: true,
                decoration: InputDecoration(
                  hintText: "Şifre",
                  prefixIcon: const Icon(Icons.lock),
                  filled: true,
                  fillColor: const Color(0xff1B1F2A),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.circular(16),
                    borderSide: BorderSide.none,
                  ),
                ),
              ),

              const SizedBox(height: 28),

              SizedBox(
                width: double.infinity,
                height: 55,
                child: ElevatedButton(
                  onPressed: () {},
                  style: ElevatedButton.styleFrom(
                    backgroundColor: const Color(0xff6C4DFF),
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(16),
                    ),
                  ),
                  child: const Text(
                    "Giriş Yap",
                    style: TextStyle(
                      fontSize: 17,
                    ),
                  ),
                ),
              ),

              const SizedBox(height: 24),

              Row(
                children: [
                  Expanded(child: Divider(color: Colors.grey.shade700)),
                  Padding(
                    padding: const EdgeInsets.symmetric(horizontal: 12),
                    child: Text(
                      "veya",
                      style: TextStyle(color: Colors.grey.shade500),
                    ),
                  ),
                  Expanded(child: Divider(color: Colors.grey.shade700)),
                ],
              ),

              const SizedBox(height: 24),

              Row(
                mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                children: [

                  _social(Icons.g_mobiledata),

                  _social(Icons.apple),

                  _social(Icons.facebook),

                ],
              ),

              const SizedBox(height: 40),

              TextButton(
                onPressed: () {},
                child: const Text("Hesabın yok mu? Kayıt Ol"),
              ),

              const Spacer(),

            ],
          ),
        ),
      ),
    );
  }

  Widget _social(IconData icon) {
    return Container(
      width: 65,
      height: 65,
      decoration: BoxDecoration(
        color: const Color(0xff1B1F2A),
        borderRadius: BorderRadius.circular(18),
      ),
      child: Icon(icon, size: 34),
    );
  }
}
