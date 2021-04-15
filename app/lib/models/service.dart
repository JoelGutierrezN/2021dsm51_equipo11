class Service{
  int id;
  String name;
  int cost;
  int premium;
  int active;
  String resume;
  String largeDescription;
  String img;

  Service({ this.id, this.name, this.cost, this.premium, this.active, this.resume, this.largeDescription, this.img });

  factory Service.fromJson(Map<String, dynamic> json){
    return Service(
      id: json['id'],
      name: json['name'],
      cost: json['cost'],
      premium: json['premium'],
      active: json['active'],
      resume: json['resume'],
      largeDescription: json['large_description'],
      img: json['img']
    );
  }
}