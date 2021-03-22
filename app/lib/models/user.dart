class User{
  int id;
  String name;
  String firstName;
  String email;
  String cellphone;
  String phone;
  String rank;
  String img;
  int active;

  User({ this.id, this.name, this.firstName, this.email, this.cellphone, this.phone, this.rank, this.img, this.active });

  factory User.fromJson(Map<String, dynamic> json){
    return User(
      id: json['id'],
      name: json['name'],
      firstName: json['first_name'],
      email: json['email'],
      cellphone: json['cellphone'],
      phone: json['phone'],
      rank: json['rank'],
      img: json['img'],
      active: json['active'],
    );
  }
}