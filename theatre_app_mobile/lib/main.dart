import 'package:flutter/material.dart';

import 'screens/home_screen.dart';
import 'screens/shows_screen.dart';
import 'screens/actors_screen.dart';
import 'screens/venues_screen.dart';

void main() {
  runApp(const TheatreApp());
}

class TheatreApp extends StatelessWidget {
  const TheatreApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Theatre Thailand',

      initialRoute: '/',

      routes: {
        '/': (context) => const HomeScreen(),
        '/shows': (context) => const ShowsScreen(),
        '/actors': (context) => const ActorsScreen(),
        '/venues': (context) => const VenuesScreen(),
      },
    );
  }
}