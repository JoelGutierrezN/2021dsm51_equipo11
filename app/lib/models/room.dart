class Room{
  int id;
  int rank;
  int cost;
  String resume;
  String largeDescription;
  String img;
  String name;
  int active;

  Room({ this.id, this.rank, this.cost, this.resume, this.largeDescription, this.img, this.name, this.active });

  factory Room.fromJson(Map<String, dynamic> json){
    return Room(
      id: json['id'],
      rank: json['rank'],
      cost: json['cost'],
      resume: json['resume'],
      largeDescription: json['largeDescription'],
      img: json['img'],
      name: json['name'],
      active: json['active']
    );
  }
}