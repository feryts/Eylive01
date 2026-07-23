import 'package:flutter/material.dart';

class StoreScreen extends StatelessWidget {
  const StoreScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: ListView(
          padding: const EdgeInsets.all(16),
          children: const [

            Text(
              "EyLive Store",
              style: TextStyle(
                fontSize: 28,
                fontWeight: FontWeight.bold,
              ),
            ),

            SizedBox(height: 20),

            StoreCategory(),

            SizedBox(height: 24),

            StoreItem(
              title: "VIP Membership",
              subtitle: "Unlock Premium Features",
              price: "499 💎",
              color: Color(0xffFFB300),
              icon: Icons.workspace_premium,
            ),

            StoreItem(
              title: "Profile Frame",
              subtitle: "Legend Frame",
              price: "150 💎",
              color: Color(0xff6C4DFF),
              icon: Icons.crop_square,
            ),

            StoreItem(
              title: "Chat Bubble",
              subtitle: "Galaxy Bubble",
              price: "80 💎",
              color: Color(0xff00BCD4),
              icon: Icons.chat_bubble,
            ),

            StoreItem(
              title: "Entrance Effect",
              subtitle: "Dragon Entrance",
              price: "1200 💎",
              color: Color(0xffE91E63),
              icon: Icons.auto_awesome,
            ),

            StoreItem(
              title: "Microphone Frame",
              subtitle: "Golden Mic",
              price: "300 💎",
              color: Color(0xff4CAF50),
              icon: Icons.mic,
            ),

          ],
        ),
      ),
    );
  }
}

class StoreCategory extends StatelessWidget {
  const StoreCategory({super.key});

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      height: 42,
      child: ListView(
        scrollDirection: Axis.horizontal,
        children: const [

          CategoryChip("VIP"),
          CategoryChip("Frames"),
          CategoryChip("Bubble"),
          CategoryChip("Entrance"),
          CategoryChip("Mic"),
          CategoryChip("Cars"),

        ],
      ),
    );
  }
}

class CategoryChip extends StatelessWidget {
  final String title;

  const CategoryChip(this.title,{super.key});

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: const EdgeInsets.only(right:10),
      padding: const EdgeInsets.symmetric(horizontal:18,vertical:10),
      decoration: BoxDecoration(
        color: const Color(0xff1B1F2A),
        borderRadius: BorderRadius.circular(25),
      ),
      child: Center(
        child: Text(title),
      ),
    );
  }
}

class StoreItem extends StatelessWidget {

  final String title;
  final String subtitle;
  final String price;
  final IconData icon;
  final Color color;

  const StoreItem({
    super.key,
    required this.title,
    required this.subtitle,
    required this.price,
    required this.icon,
    required this.color,
  });

  @override
  Widget build(BuildContext context) {

    return Card(
      color: const Color(0xff1B1F2A),
      elevation: 0,
      margin: const EdgeInsets.only(bottom:16),
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(22),
      ),
      child: Padding(
        padding: const EdgeInsets.all(18),
        child: Row(
          children: [

            CircleAvatar(
              radius:30,
              backgroundColor: color,
              child: Icon(
                icon,
                color: Colors.white,
              ),
            ),

            const SizedBox(width:16),

            Expanded(
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [

                  Text(
                    title,
                    style: const TextStyle(
                      fontSize:18,
                      fontWeight: FontWeight.bold,
                    ),
                  ),

                  const SizedBox(height:4),

                  Text(
                    subtitle,
                    style: const TextStyle(
                      color: Colors.grey,
                    ),
                  ),

                ],
              ),
            ),

            ElevatedButton(
              onPressed: () {},
              child: Text(price),
            ),

          ],
        ),
      ),
    );
  }
}
