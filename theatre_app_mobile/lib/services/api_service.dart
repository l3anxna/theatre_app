import 'dart:convert';
import 'package:http/http.dart' as http;

class ApiService {
  static const String baseUrl = 'http://127.0.0.1:8000/api';

  Future<List<dynamic>> fetchShows() async {
    final response = await http.get(
      Uri.parse('$baseUrl/shows'),
    );

    if (response.statusCode == 200) {
      return jsonDecode(response.body);
    }

    throw Exception('Failed to load shows');
  }

  Future<List<dynamic>> fetchActors() async {
    final response = await http.get(
      Uri.parse('$baseUrl/actors'),
    );

    if (response.statusCode == 200) {
      return jsonDecode(response.body);
    }

    throw Exception('Failed to load actors');
  }

  Future<List<dynamic>> fetchVenues() async {
    final response = await http.get(
      Uri.parse('$baseUrl/venues'),
    );

    if (response.statusCode == 200) {
      return jsonDecode(response.body);
    }

    throw Exception('Failed to load venues');
  }
}