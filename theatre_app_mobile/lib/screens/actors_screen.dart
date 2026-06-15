import 'package:flutter/material.dart';

class ActorsScreen extends StatelessWidget {
  const ActorsScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Actors'),
      ),
      body: const Center(
        child: Text('Actors Screen'),
      ),
    );
  }
}