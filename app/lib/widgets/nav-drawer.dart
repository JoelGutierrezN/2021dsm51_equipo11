
import 'dart:convert';

import 'package:app/models/user.dart';
import 'package:app/providers/auth.dart';
import 'package:app/screen/edit-profile-screen.dart';
import 'package:app/screen/rooms-screen.dart';
import 'package:app/screen/users-screen.dart';
import 'package:app/screen/service-screen.dart';
import 'package:app/forms/register-form.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

import 'package:app/screen/login-screen.dart';
import 'package:provider/provider.dart';
import 'package:dio/dio.dart' as Dio;

import '../dio.dart';

class NavDrawer extends StatelessWidget{
  User _user;
  User get user => _user;
  @override
  Widget build(BuildContext context) {
    return Drawer(
      child: Consumer<Auth>(
        builder: (context, auth, child) {
          if (auth.authenticated) {
            if(auth.user.rank == "Admin"){
            return ListView(
              children: [
                ListTile(
                  leading: ClipRRect(
                  borderRadius: BorderRadius.all(Radius.circular(30.0)),
                  child: Image.network(
                      'http://safetydogs.online/laravel/storage/app/users/${auth.user.img}',
                      width: 50,
                      height: 50,
                    ),
                  ),
                  subtitle: Text('${auth.user.rank}'),
                  title: Text('${auth.user.name} ${auth.user.firstName}',
                    style: TextStyle(
                      fontFamily: 'Satisfy',
                      fontSize: 20,
                      color: Colors.orange[700]
                    ),
                    textAlign: TextAlign.center,
                  ),
                  onTap: () {
                    getData(auth.user.id);
                    Navigator.push(context, MaterialPageRoute(builder: (context) => EditProfileScreen(user: user)));
                  }
                ),
                ListTile(
                  title: Text('Habitaciones',
                    style: TextStyle(
                      fontFamily: 'Satisfy',
                      fontSize: 15
                    ),
                    textAlign: TextAlign.center,
                  ),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => RoomsScreen()));
                  }
                ),
                ListTile(
                  title: Text('Servicios',
                    style: TextStyle(
                      fontFamily: 'Satisfy',
                      fontSize: 15
                    ),
                    textAlign: TextAlign.center,
                  ),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => ServiceScreen()));
                  }
                ),
                ListTile(
                  title: Text('Usuarios',
                    style: TextStyle(
                      fontFamily: 'Satisfy',
                      fontSize: 15
                    ),
                    textAlign: TextAlign.center,
                  ),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => UsersScreen()));
                  }
                ),
                ListTile(
                  title: Text('Cerrar Sesion',
                    style: TextStyle(
                      fontFamily: 'Satisfy',
                      fontSize: 15
                    ),
                    textAlign: TextAlign.center,
                  ),
                  onTap: () {
                    Provider.of<Auth>(context, listen: false).logout();
                  }
                ),
              ]   
            );
            }else{
            return ListView(
              children: [
                ListTile(
                  leading: ClipRRect(
                  borderRadius: BorderRadius.all(Radius.circular(30.0)),
                  child: Image.network(
                      'http://safetydogs.online/laravel/storage/app/users/${auth.user.img}',
                      width: 50,
                      height: 50,
                    ),
                  ),
                  subtitle: Text('${auth.user.rank}'),
                  title: Text('${auth.user.name} ${auth.user.firstName}',
                    style: TextStyle(
                      fontFamily: 'Satisfy',
                      fontSize: 20,
                      color: Colors.orange[700]
                    ),
                    textAlign: TextAlign.center,
                  ),
                  onTap: () {
                    getData(auth.user.id);
                    Navigator.push(context, MaterialPageRoute(builder: (context) => EditProfileScreen(user: user)));
                  }
                ),
                ListTile(
                  title: Text('Habitaciones',
                    style: TextStyle(
                      fontFamily: 'Satisfy',
                      fontSize: 15
                    ),
                    textAlign: TextAlign.center,
                  ),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => RoomsScreen()));
                  }
                ),
                ListTile(
                  title: Text('Servicios',
                    style: TextStyle(
                      fontFamily: 'Satisfy',
                      fontSize: 15
                    ),
                    textAlign: TextAlign.center,
                  ),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => ServiceScreen()));
                  }
                ),
                ListTile(
                  title: Text('Cerrar Sesion',
                    style: TextStyle(
                      fontFamily: 'Satisfy',
                      fontSize: 15
                    ),
                    textAlign: TextAlign.center,
                  ),
                  onTap: () {
                    Provider.of<Auth>(context, listen: false).logout();
                  }
                ),
              ]   
            );
            }
          } else {
            return ListView(
              children: [
                ListTile(
                  title: Text('Iniciar Sesion',
                    style: TextStyle(
                      fontFamily: 'Satisfy',
                      fontSize: 15
                    ),
                    textAlign: TextAlign.center,
                  ),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => LoginScreen()));
                  }
                ),
                ListTile(
                  title: Text('Registrarse',
                    style: TextStyle(
                      fontFamily: 'Satisfy',
                      fontSize: 15
                    ),
                    textAlign: TextAlign.center,
                  ),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => RegisterScreen()));
                  }
                ),
              ],
            );
          }
        },
      ),
    );
  }

  Future getData (int id) async{
    Dio.Response response = await dio().get(
      'usuarios/'+id.toString(),
      options: Dio.Options(
        headers: {'auth': true}
        )
      );

    _user = User.fromJson(json.decode(response.toString()));
  }
}
