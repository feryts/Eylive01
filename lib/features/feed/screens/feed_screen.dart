import 'package:flutter/material.dart';

class FeedScreen extends StatelessWidget {
  const FeedScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: ListView(
          padding: const EdgeInsets.all(16),
          children: const [

            Text(
              "Community Feed",
              style: TextStyle(
                fontSize: 28,
                fontWeight: FontWeight.bold,
              ),
            ),

            SizedBox(height: 20),

            FeedPostCard(
              username: "EyLive Official",
              message:
                  "🎉 Welcome to EyLive! Join voice rooms, meet new friends and enjoy exclusive events.",
              likes: 892,
              comments: 241,
            ),

            FeedPostCard(
              username: "DJ Luna",
              message:
                  "Tonight Music Party starts at 21:00 🎧 Don't miss it!",
              likes: 420,
              comments: 91,
            ),

            FeedPostCard(
              username: "Gaming TR",
              message:
                  "PUBG tournament registration is now open! 🔥",
              likes: 260,
              comments: 37,
            ),
          ],
        ),
      ),
    );
  }
}

class FeedPostCard extends StatelessWidget {
  final String username;
  final String message;
  final int likes;
  final int comments;

  const FeedPostCard({
    super.key,
    required this.username,
    required this.message,
    required this.likes,
    required this.comments,
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
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [

            Row(
              children: [

                const CircleAvatar(
                  radius: 24,
                  child: Icon(Icons.person),
                ),

                const SizedBox(width: 12),

                Expanded(
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [

                      Text(
                        username,
                        style: const TextStyle(
                          fontWeight: FontWeight.bold,
                          fontSize: 17,
                        ),
                      ),

                      const Text(
                        "2 minutes ago",
                        style: TextStyle(
                          color: Colors.grey,
                        ),
                      ),

                    ],
                  ),
                ),

                const Icon(Icons.more_vert),

              ],
            ),

            const SizedBox(height: 18),

            Text(
              message,
              style: const TextStyle(
                fontSize: 16,
              ),
            ),

            const SizedBox(height: 18),

            ClipRRect(
              borderRadius: BorderRadius.circular(18),
              child: Container(
                height: 180,
                color: Colors.black26,
                child: const Center(
                  child: Icon(
                    Icons.image,
                    size: 60,
                  ),
                ),
              ),
            ),

            const SizedBox(height: 18),

            Row(
              mainAxisAlignment: MainAxisAlignment.spaceAround,
              children: [

                Row(
                  children: [
                    const Icon(Icons.favorite_border),
                    const SizedBox(width: 6),
                    Text(likes.toString()),
                  ],
                ),

                Row(
                  children: [
                    const Icon(Icons.chat_bubble_outline),
                    const SizedBox(width: 6),
                    Text(comments.toString()),
                  ],
                ),

                const Row(
                  children: [
                    Icon(Icons.share_outlined),
                    SizedBox(width: 6),
                    Text("Share"),
                  ],
                ),

              ],
            ),

          ],
        ),
      ),
    );
  }
}
