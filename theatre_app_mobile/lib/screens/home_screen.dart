import 'package:flutter/material.dart';
import '../models/show.dart';
import '../services/api_service.dart';

class HomeScreen extends StatefulWidget {
  const HomeScreen({super.key});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  final ApiService api = ApiService();

  List<Show> shows = [];

  bool loading = true;

  @override
  void initState() {
    super.initState();
    loadShows();
  }

  Future<void> loadShows() async {
    try {
      final data = await api.fetchShows();

      setState(() {
        shows = data.map<Show>((e) => Show.fromJson(e)).toList();
        loading = false;
      });
    } catch (e) {
      print(e);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Upcoming Shows'),
      ),
      body: loading
          ? const Center(
              child: CircularProgressIndicator(),
            )
          : ListView.builder(
              itemCount: shows.length,
              itemBuilder: (context, index) {
                final show = shows[index];

                return Card(
                  margin: const EdgeInsets.all(10),
                  child: ListTile(
                    title: Text(show.title),
                    subtitle: Text(show.description),
                  ),
                );
              },
            ),
    );
  }
}