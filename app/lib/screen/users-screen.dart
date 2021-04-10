import 'dart:convert';
import 'dart:developer';

import 'package:app/models/user.dart';
import 'package:app/screen/user-screen.dart';
import 'package:dio/dio.dart' as Dio;
import 'package:flutter/material.dart';

import '../dio.dart';

class UsersScreen extends StatefulWidget{
  @override
  State<StatefulWidget> createState(){
    return UsersState();
  }
}

class UsersState extends State<UsersScreen>{
  Future <List<User>> getUsers() async{
    Dio.Response response = await dio().get(
      'app/users',
      options: Dio.Options(
        headers: {'auth': true}
        )
      );

    List users = json.decode(response.toString());

    return users.map((user) => User.fromJson(user)).toList();

  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
     backgroundColor: Color(0xFFFFF3E0),
      appBar: AppBar(
        backgroundColor: Color(0xFFFF5722),
        title: Text('Usuarios'), 
        actions: <Widget>[
          // CircleAvatar()
          _agregaProducto(),
          _recargarProductos(),
        ],
      ),
      body: Center(
        child: FutureBuilder<List<User>>(
            future: getUsers(),
            builder: (context, snapshot) {
              if (snapshot.connectionState != ConnectionState.done) {
                return CircularProgressIndicator();
              } else if (snapshot.hasData) {
                return ListView.builder(
                    itemCount: snapshot.data.length,
                    itemBuilder: (context, index) {
                      var item = snapshot.data[index];
                      // return ListTile(title: Text(item.name));
                      return ListTile(
                        title: Text('${item.name} ${item.firstName} - ${item.rank}'),
                        subtitle: Text(item.email),
                        leading: Image.network('http://safetydogs.online/laravel/storage/app/users/${item.img}'),
                        trailing: Icon(Icons.edit),
                        onTap: () {
                          // log('Agregar al carrito: ' + item.id.toString());
                          Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) =>
                                      UserScreen(user: item)));
                        },
                      );
                    });
              } else if (snapshot.hasError) {
                log(snapshot.error.toString());
                return Text('Falló la carga de productos');
              }
              return CircularProgressIndicator();
            }),
      ),
    );
  }

  Widget _agregaProducto() {
    return TextButton(
        style: ButtonStyle(
          foregroundColor: MaterialStateProperty.all<Color>(Colors.white),
          backgroundColor: MaterialStateProperty.all<Color>(Colors.black),
          overlayColor: MaterialStateProperty.resolveWith<Color>(
            (Set<MaterialState> states) {
              if (states.contains(MaterialState.hovered))
                return Colors.blue.withOpacity(0.04);
              if (states.contains(MaterialState.focused) ||
                  states.contains(MaterialState.pressed))
                return Colors.blue.withOpacity(0.12);
              return null; // Defer to the widget's default.
            },
          ),
        ),
        onPressed: () {
          // print('agregar');
          User user = User(
              id: 0,
              name: '',
              firstName: '',
              email: '',
              phone: '',
              cellphone: '',
              img: '',
              active: 1,
              rank: 'Usuario'
          );
          Navigator.push(
              context,
              MaterialPageRoute(
                  builder: (context) => UserScreen(user: user)));
        },
        child: Icon(Icons.add));
  }

  Widget _recargarProductos() {
    return TextButton(
        style: ButtonStyle(
          foregroundColor: MaterialStateProperty.all<Color>(Colors.white),
          backgroundColor: MaterialStateProperty.all<Color>(Colors.black),
          overlayColor: MaterialStateProperty.resolveWith<Color>(
            (Set<MaterialState> states) {
              if (states.contains(MaterialState.hovered))
                return Colors.blue.withOpacity(0.04);
              if (states.contains(MaterialState.focused) ||
                  states.contains(MaterialState.pressed))
                return Colors.blue.withOpacity(0.12);
              return null; // Defer to the widget's default.
            },
          ),
        ),
        onPressed: () {
          setState(() {});
        },
        child: Icon(Icons.refresh));
  }
}