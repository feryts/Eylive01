import 'package:flutter/material.dart';

import 'core/theme/app_theme.dart';
import 'shared/main_navigation.dart';

class EyLiveApp extends StatelessWidget {
  const EyLiveApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'EyLive',
      debugShowCheckedModeBanner: false,

      theme: AppTheme.light,
      darkTheme: AppTheme.dark,
      themeMode: ThemeMode.dark,

      home: const MainNavigation(),
    );
  }
}
