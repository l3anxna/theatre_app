class Show {
  final int id;
  final String title;
  final String description;

  Show({
    required this.id,
    required this.title,
    required this.description,
  });

  factory Show.fromJson(Map<String, dynamic> json) {
    return Show(
      id: json['id'],
      title: json['title'] ?? '',
      description: json['description'] ?? '',
    );
  }
}