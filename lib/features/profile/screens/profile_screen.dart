import 'package:flutter/material.dart';

class ProfileScreen extends StatelessWidget {
  const ProfileScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: ListView(
          padding: const EdgeInsets.all(16),
          children: const [

            ProfileHeader(),

            SizedBox(height: 24),

            WalletCard(),

            SizedBox(height: 24),

            ProfileMenu(),

          ],
        ),
      ),
    );
  }
}

class ProfileHeader extends StatelessWidget {
  const ProfileHeader({super.key});

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.all(20),
      decoration: BoxDecoration(
        color: const Color(0xff1B1F2A),
        borderRadius: BorderRadius.circular(24),
      ),
      child: Column(
        children: [

          const CircleAvatar(
            radius: 45,
            child: Icon(Icons.person,size:45),
          ),

          const SizedBox(height:16),

          const Text(
            "EyLive User",
            style: TextStyle(
              fontSize:22,
              fontWeight: FontWeight.bold,
            ),
          ),

          const SizedBox(height:6),

          Text(
            "EY0000001",
            style: TextStyle(
              color: Colors.grey.shade400,
            ),
          ),

          const SizedBox(height:14),

          Container(
            padding: const EdgeInsets.symmetric(
              horizontal:18,
              vertical:8,
            ),
            decoration: BoxDecoration(
              color: Colors.amber,
              borderRadius: BorderRadius.circular(20),
            ),
            child: const Text(
              "VIP 3",
              style: TextStyle(
                color: Colors.black,
                fontWeight: FontWeight.bold,
              ),
            ),
          ),

          const SizedBox(height:20),

          const Row(
            mainAxisAlignment: MainAxisAlignment.spaceAround,
            children: [

              StatItem("Followers","1.2K"),

              StatItem("Following","352"),

              StatItem("Visitors","5.4K"),

            ],
          ),

        ],
      ),
    );
  }
}

class WalletCard extends StatelessWidget {
  const WalletCard({super.key});

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.all(18),
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(22),
        gradient: const LinearGradient(
          colors: [
            Color(0xff6C4DFF),
            Color(0xffFF5CA8),
          ],
        ),
      ),
      child: const Row(
        mainAxisAlignment: MainAxisAlignment.spaceAround,
        children: [

          WalletItem(
            icon: Icons.monetization_on,
            title: "Coins",
            value: "25,800",
          ),

          WalletItem(
            icon: Icons.diamond,
            title: "Diamonds",
            value: "1,240",
          ),

        ],
      ),
    );
  }
}

class WalletItem extends StatelessWidget {

  final IconData icon;
  final String title;
  final String value;

  const WalletItem({
    super.key,
    required this.icon,
    required this.title,
    required this.value,
  });

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [

        Icon(icon,size:34),

        const SizedBox(height:8),

        Text(
          value,
          style: const TextStyle(
            fontSize:20,
            fontWeight: FontWeight.bold,
          ),
        ),

        Text(title),

      ],
    );
  }
}

class ProfileMenu extends StatelessWidget {
  const ProfileMenu({super.key});

  @override
  Widget build(BuildContext context) {

    return Column(
      children: const [

        MenuTile(
          icon: Icons.workspace_premium,
          title: "VIP Membership",
        ),

        MenuTile(
          icon: Icons.account_balance_wallet,
          title: "Wallet",
        ),

        MenuTile(
          icon: Icons.inventory_2,
          title: "Inventory",
        ),

        MenuTile(
          icon: Icons.groups,
          title: "Agency",
        ),

        MenuTile(
          icon: Icons.settings,
          title: "Settings",
        ),

      ],
    );
  }
}

class MenuTile extends StatelessWidget {

  final IconData icon;
  final String title;

  const MenuTile({
    super.key,
    required this.icon,
    required this.title,
  });

  @override
  Widget build(BuildContext context) {
    return Card(
      color: const Color(0xff1B1F2A),
      elevation: 0,
      margin: const EdgeInsets.only(bottom:12),
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(18),
      ),
      child: ListTile(
        leading: Icon(icon),
        title: Text(title),
        trailing: const Icon(Icons.chevron_right),
        onTap: () {},
      ),
    );
  }
}

class StatItem extends StatelessWidget {

  final String title;
  final String value;

  const StatItem(this.title,this.value,{super.key});

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [

        Text(
          value,
          style: const TextStyle(
            fontSize:20,
            fontWeight: FontWeight.bold,
          ),
        ),

        const SizedBox(height:4),

        Text(title),

      ],
    );
  }
}
