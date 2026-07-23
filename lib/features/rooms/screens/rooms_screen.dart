import 'package:flutter/material.dart';

class RoomsScreen extends StatelessWidget {
  const RoomsScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: ListView(
          padding: const EdgeInsets.all(16),
          children: const [

            Text(
              "Voice Rooms",
              style: TextStyle(
                fontSize: 28,
                fontWeight: FontWeight.bold,
              ),
            ),

            SizedBox(height: 20),

            RoomItem(
              roomName: "🇹🇷 Türkiye Sohbet",
              host: "EyLive Official",
              users: 328,
              language: "TR",
              locked: false,
            ),

            RoomItem(
              roomName: "🎵 Music Night",
              host: "DJ Luna",
              users: 188,
              language: "EN",
              locked: false,
            ),

            RoomItem(
              roomName: "💕 Dating Room",
              host: "Alice",
              users: 91,
              language: "Global",
              locked: true,
            ),

            RoomItem(
              roomName: "🎮 PUBG Türkiye",
              host: "Pro Gamer",
              users: 142,
              language: "TR",
              locked: false,
            ),

            RoomItem(
              roomName: "🌍 Global Chat",
              host: "EyLive",
              users: 503,
              language: "Global",
              locked: false,
            ),
          ],
        ),
      ),
    );
  }
}

class RoomItem extends StatelessWidget {

  final String roomName;
  final String host;
  final int users;
  final String language;
  final bool locked;

  const RoomItem({
    super.key,
    required this.roomName,
    required this.host,
    required this.users,
    required this.language,
    required this.locked,
  });

  @override
  Widget build(BuildContext context) {

    return Card(
      margin: const EdgeInsets.only(bottom: 18),
      color: const Color(0xff1B1F2A),
      elevation: 0,
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(22),
      ),
      child: Padding(
        padding: const EdgeInsets.all(18),
        child: Column(
          children: [

            Row(
              children: [

                const CircleAvatar(
                  radius: 28,
                  child: Icon(Icons.mic),
                ),

                const SizedBox(width: 14),

                Expanded(
                  child: Column(
                    crossAxisAlignment:
                        CrossAxisAlignment.start,
                    children: [

                      Text(
                        roomName,
                        style: const TextStyle(
                          fontWeight: FontWeight.bold,
                          fontSize: 18,
                        ),
                      ),

                      const SizedBox(height: 4),

                      Text(host),

                    ],
                  ),
                ),

                if (locked)
                  const Icon(
                    Icons.lock,
                    color: Colors.amber,
                  ),

              ],
            ),

            const SizedBox(height: 18),

            Row(
              children: [

                Chip(
                  label: Text(language),
                ),

                const Spacer(),

                const Icon(Icons.people),

                const SizedBox(width: 6),

                Text(users.toString()),

              ],
            ),

            const SizedBox(height: 18),

            SizedBox(
              width: double.infinity,
              height: 46,
              child: ElevatedButton.icon(
                onPressed: () {},
                icon: const Icon(Icons.headset),
                label: const Text("Join Room"),
              ),
            ),

          ],
        ),
      ),
    );
  }
}
