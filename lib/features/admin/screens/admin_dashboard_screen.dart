import 'package:flutter/material.dart';

class AdminDashboardScreen extends StatelessWidget {
  const AdminDashboardScreen({super.key});

  @override
  Widget build(BuildContext context) {
    final items = [
      ("👥", "Users"),
      ("🎙", "Rooms"),
      ("🏢", "Agencies"),
      ("🎁", "Gifts"),
      ("💎", "Wallet"),
      ("👑", "VIP"),
      ("📢", "Announcements"),
      ("⚠", "Reports"),
      ("📊", "Statistics"),
    ];

    return Scaffold(
      appBar: AppBar(
        title: const Text("Admin Panel"),
      ),
      body: GridView.builder(
        padding: const EdgeInsets.all(16),
        itemCount: items.length,
        gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(
          crossAxisCount: 2,
          mainAxisSpacing: 16,
          crossAxisSpacing: 16,
          childAspectRatio: 1.2,
        ),
        itemBuilder: (context, index) {
          final item = items[index];

          return Card(
            elevation: 0,
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(20),
            ),
            child: InkWell(
              borderRadius: BorderRadius.circular(20),
              onTap: () {},
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Text(
                    item.$1,
                    style: const TextStyle(fontSize: 42),
                  ),
                  const SizedBox(height: 10),
                  Text(
                    item.$2,
                    style: const TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 17,
                    ),
                  ),
                ],
              ),
            ),
          );
        },
      ),
    );
  }
}
