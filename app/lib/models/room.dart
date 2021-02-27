class Room{
  int id;
  String rank;
  int cost;

  Room({ this.id, this.rank, this.cost });

  factory Room.fromJson(Map<String, dynamic> json){
    return Room(
      id: json['id'],
      rank: json['rank'],
      cost: json['cost']
    );
  }
}