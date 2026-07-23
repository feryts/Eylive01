import 'package:flutter/material.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "EyLive",
          style: TextStyle(fontWeight: FontWeight.bold),
        ),
        centerTitle: false,
        actions: [
          IconButton(
            onPressed: () {},
            icon: const Icon(Icons.search),
          ),
          IconButton(
            onPressed: () {},
            icon: const Icon(Icons.notifications_none),
          ),
        ],
      ),
      body: ListView(
        padding: const EdgeInsets.all(16),
        children: const [
          _BannerCard(),
          SizedBox(height: 20),
          Text(
            "Popüler Odalar",
            style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
          ),
          SizedBox(height: 12),
          RoomCard(
            roomName: "Türkiye Sohbet",
            host: "EyLive Official",
            users: 328,
            category: "Sohbet",
          ),
          RoomCard(
            roomName: "Music Night",
            host: "DJ Luna",
            users: 185,
            category: "Müzik",
          ),
          RoomCard(
            roomName: "Gaming TR",
            host: "Pro Gamer",
            users: 96,
            category: "Oyun",
          ),
        ],
      ),
    );
  }
}

class _BannerCard extends StatelessWidget {
  const _BannerCard();

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 160,
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(20),
        gradient: const LinearGradient(
          colors: [
            Color(0xFF6C4DFF),
            Color(0xFFFF5CA8),
          ],
        ),
      ),
      child: const Center(
        child: Text(
          "EyLive Official Event",
          style: TextStyle(
            fontSize: 24,
            color: Colors.white,
            fontWeight: FontWeight.bold,
          ),
        ),
      ),
    );
  }
}

class RoomCard extends StatelessWidget {
  final String roomName;
  final String host;
  final int users;
  final String category;

  const RoomCard({
    super.key,
    required this.roomName,
    required this.host,
    required this.users,
    required this.category,
  });

  @override
  Widget build(BuildContext context) {
    return Card(
      margin: const EdgeInsets.only(bottom: 14),
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(18),
      ),
      child: ListTile(
        leading: const CircleAvatar(
          child: Icon(Icons.mic),
        ),
        title: Text(roomName),
        subtitle: Text("$host • $category"),
        trailing: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            const Icon(Icons.people, size: 18),
            Text(users.toString()),
          ],
        ),
      ),
    );
  }
}
