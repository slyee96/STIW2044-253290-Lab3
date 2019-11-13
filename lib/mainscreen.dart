import 'package:flutter/material.dart';

class MainScreen extends StatefulWidget {
  final String email;

  const MainScreen({Key key, this.email}) : super(key: key);
  @override
  _MainScreenState createState() => _MainScreenState();
}

class _MainScreenState extends State<MainScreen> {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Main Screen',
      theme: new ThemeData(primarySwatch: Colors.orange),
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        backgroundColor: Colors.orange[100],
        resizeToAvoidBottomPadding: false,
        appBar: AppBar(
          title: Text('Main Screen'),
        ),
        body: Center(
          child: Container(
            child: Text('Hello World'),
          ),
        ),
      ),
    );
  }
}
