
import 'package:app/providers/auth.dart';
import 'package:app/screen/rooms-creen.dart';
import 'package:app/screen/users-screen.dart';
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
            return ListView(
                    children: [
                      ListTile(
                        title: Text(auth.user.name),
                      ),
                      ListTile(
                        title: Text('Habitaciones'),
                        onTap: () {
                          Navigator.push(context, MaterialPageRoute(builder: (context) => RoomsScreen()));
                        }
                      ),
                      ListTile(
                        title: Text('Publicaciones'),
                        onTap: () {
                          Navigator.push(context, MaterialPageRoute(builder: (context) => PostsScreen()));
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
                    Navigator.push(context, MaterialPageRoute(builder: (context) => LoginScreen()));
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
