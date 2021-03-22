
import 'package:app/providers/auth.dart';
import 'package:app/screen/rooms-screen.dart';
import 'package:app/screen/users-screen.dart';
import 'package:app/screen/service-screen.dart';
import 'package:app/forms/register-form.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

import 'package:app/screen/posts-screen.dart';
import 'package:app/screen/login-screen.dart';
import 'package:provider/provider.dart';

class NavDrawer extends StatelessWidget{
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
                  title: Text('${auth.user.name} ${auth.user.firstName}'),
                ),
                ListTile(
                  title: Text('Habitaciones'),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => RoomsScreen()));
                  }
                ),
                ListTile(
                  title: Text('Servicios'),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => ServiceScreen()));
                  }
                ),
                ListTile(
                  title: Text('Usuarios'),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => UsersScreen()));
                  }
                ),
                ListTile(
                  title: Text('Cerrar Sesion'),
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
                  title: Text('${auth.user.name} ${auth.user.firstName}'),
                ),
                ListTile(
                  title: Text('Habitaciones'),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => RoomsScreen()));
                  }
                ),
                ListTile(
                  title: Text('Servicios'),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => ServiceScreen()));
                  }
                ),
                ListTile(
                  title: Text('Cerrar Sesion'),
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
                  title: Text('Iniciar Sesion'),
                  onTap: () {
                    Navigator.push(context, MaterialPageRoute(builder: (context) => LoginScreen()));
                  }
                ),
                ListTile(
                  title: Text('Registrarse'),
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
}
