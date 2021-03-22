class Service{
  int id;
  String name;
  int cost;
  int premium;
  String resume;
  String largeDescription;
  String image;

  Service({ this.id, this.name, this.cost, this.premium, this.resume, this.largeDescription, this.image });

  factory Service.fromJson(Map<String, dynamic> json){
    return Service(
      id: json['id'],
      name: json['name'],
      cost: json['cost'],
      premium: json['premium'],
      resume: json['resume'],
      largeDescription: json['large_description'],
      image: json['image']
    );
  }
}