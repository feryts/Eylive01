import 'package:flutter/material.dart';

class UserAvatar extends StatelessWidget {
  final double radius;
  final String? imageUrl;

  const UserAvatar({
    super.key,
    this.radius = 26,
    this.imageUrl,
  });

  @override
  Widget build(BuildContext context) {
    return CircleAvatar(
      radius: radius,
      backgroundColor: const Color(0xff6C4DFF),
      backgroundImage:
          imageUrl != null ? NetworkImage(imageUrl!) : null,
      child: imageUrl == null
          ? Icon(
              Icons.person,
              size: radius,
              color: Colors.white,
            )
          : null,
    );
  }
}
