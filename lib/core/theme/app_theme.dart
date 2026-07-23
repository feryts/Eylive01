import 'package:flutter/material.dart';

class AppTheme {
  static const Color primary = Color(0xff6C4DFF);
  static const Color secondary = Color(0xffFF5CA8);

  static const Color background = Color(0xff0F1117);

  static const Color card = Color(0xff1B1F2A);

  static ThemeData dark = ThemeData(
    useMaterial3: true,
    brightness: Brightness.dark,
    scaffoldBackgroundColor: background,

    colorScheme: ColorScheme.dark(
      primary: primary,
      secondary: secondary,
      surface: card,
    ),
  );

  static ThemeData light = ThemeData(
    useMaterial3: true,
  );
}
