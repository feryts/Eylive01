import 'package:flutter/material.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: ListView(
          padding: const EdgeInsets.all(16),
          children: const [

            HomeHeader(),

            SizedBox(height: 20),

            EventBanner(),

            SizedBox(height: 20),

            CategorySection(),

            SizedBox(height: 24),

            SectionTitle("🔥 Popüler Odalar"),

            SizedBox(height: 12),

            RoomCard(
              roomName: "Türkiye Sohbet",
              hostName: "EyLive Official",
              users: 326,
            ),

            RoomCard(
              roomName: "Music Night",
              hostName: "DJ Luna",
              users: 184,
            ),

            RoomCard(
              roomName: "Gaming Türkiye",
              hostName: "Pro Gamer",
              users: 97,
            ),

            SizedBox(height: 30),

            SectionTitle("🆕 Yeni Odalar"),

            SizedBox(height: 12),

            RoomCard(
              roomName: "Arkadaşlık",
              hostName: "Eylive",
              users: 21,
            ),

            RoomCard(
              roomName: "Kahve Molası",
              hostName: "Coffee",
              users: 14,
            ),
          ],
        ),
      ),
    );
  }
}

class HomeHeader extends StatelessWidget {
  const HomeHeader({super.key});

  @override
  Widget build(BuildContext context) {
    return Row(
      children: [

        const CircleAvatar(
          radius: 24,
          child: Icon(Icons.person),
        ),

        const SizedBox(width: 12),

        const Expanded(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [

              Text(
                "Hoş Geldin",
                style: TextStyle(
                  color: Colors.grey,
                ),
              ),

              Text(
                "EyLive",
                style: TextStyle(
                  fontSize: 22,
                  fontWeight: FontWeight.bold,
                ),
              ),
            ],
          ),
        ),

        IconButton(
          onPressed: null,
          icon: const Icon(Icons.search),
        ),

        IconButton(
          onPressed: null,
          icon: const Icon(Icons.notifications_none),
        ),
      ],
    );
  }
}

class EventBanner extends StatelessWidget {
  const EventBanner({super.key});

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 170,
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(22),
        gradient: const LinearGradient(
          colors: [
            Color(0xff6C4DFF),
            Color(0xffFF5CA8),
          ],
        ),
      ),
      child: const Center(
        child: Text(
          "EYLIVE\nSUMMER EVENT",
          textAlign: TextAlign.center,
          style: TextStyle(
            fontSize: 28,
            color: Colors.white,
            fontWeight: FontWeight.bold,
          ),
        ),
      ),
    );
  }
}

class CategorySection extends StatelessWidget {
  const CategorySection({super.key});

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      height: 42,
      child: ListView(
        scrollDirection: Axis.horizontal,
        children: const [

          CategoryChip("🎤 Sohbet"),

          CategoryChip("🎵 Müzik"),

          CategoryChip("🎮 Oyun"),

          CategoryChip("💕 Arkadaşlık"),

          CategoryChip("🌍 Global"),

        ],
      ),
    );
  }
}

class CategoryChip extends StatelessWidget {
  final String title;

  const CategoryChip(this.title, {super.key});

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: const EdgeInsets.only(right: 10),
      padding: const EdgeInsets.symmetric(
        horizontal: 18,
        vertical: 10,
      ),
      decoration: BoxDecoration(
        color: const Color(0xff1B1F2A),
        borderRadius: BorderRadius.circular(30),
      ),
      child: Text(title),
    );
  }
}

class SectionTitle extends StatelessWidget {
  final String title;

  const SectionTitle(this.title, {super.key});

  @override
  Widget build(BuildContext context) {
    return Text(
      title,
      style: const TextStyle(
        fontSize: 20,
        fontWeight: FontWeight.bold,
      ),
    );
  }
}

class RoomCard extends StatelessWidget {
  final String roomName;
  final String hostName;
  final int users;

  const RoomCard({
    super.key,
    required this.roomName,
    required this.hostName,
    required this.users,
  });

  @override
  Widget build(BuildContext context) {
    return Card(
      margin: const EdgeInsets.only(bottom: 14),
      elevation: 0,
      color: const Color(0xff1B1F2A),
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(20),
      ),
      child: ListTile(
        contentPadding: const EdgeInsets.all(14),
        leading: const CircleAvatar(
          radius: 26,
          child: Icon(Icons.mic),
        ),
        title: Text(
          roomName,
          style: const TextStyle(
            fontWeight: FontWeight.bold,
          ),
        ),
        subtitle: Text(hostName),
        trailing: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            const Icon(Icons.people),
            Text(users.toString()),
          ],
        ),
      ),
    );
  }
}
