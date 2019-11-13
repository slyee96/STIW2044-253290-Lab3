import 'package:flutter/material.dart';
import 'package:toast/toast.dart';
import 'package:http/http.dart' as http;
import 'package:progress_dialog/progress_dialog.dart';
import 'loginscreen.dart';

class ForgotPassword extends StatefulWidget {
  @override
  _ForgotPasswordState createState() => _ForgotPasswordState();
}

class _ForgotPasswordState extends State<ForgotPassword> {
  final TextEditingController _emailcontroller = TextEditingController();
  String _email = "";
  String urlPass = "http://myondb.com/myNelayanLY/php/forgotpassword.php";

  @override
  Widget build(BuildContext context) {
    return WillPopScope(
      onWillPop: _onBackPressAppBar,
      child: Scaffold(
        backgroundColor: Colors.orange[100],
        resizeToAvoidBottomPadding: false,
        appBar: AppBar(
          title: Text('Reset Password'),
        ),
        body: Container(
          padding: EdgeInsets.all(16.0),
          child: Column(
            children: <Widget>[
              Text("Enter your email address to reset password"),
              SizedBox(
                height: 10.0,
              ),
              TextField(
                  controller: _emailcontroller,
                  keyboardType: TextInputType.text,
                  decoration: InputDecoration(
                    labelText: 'Email',
                    icon: Icon(Icons.person),
                  )),
              SizedBox(
                height: 20.0,
              ),
              MaterialButton(
                shape: RoundedRectangleBorder(
                    side: BorderSide(
                        color: Colors.black,
                        width: 2,
                        style: BorderStyle.solid),
                    borderRadius: BorderRadius.circular(20.0)),
                minWidth: 200,
                height: 50,
                child: Text('Reset Password'),
                color: Colors.orange,
                textColor: Colors.black,
                elevation: 15,
                onPressed: _onResetPassword,
              ),
            ],
          ),
        ),
      ),
    );
  }

  Future<bool> _onBackPressAppBar() {
    Navigator.pushReplacement(
        context,
        MaterialPageRoute(
          builder: (context) => LoginPage(),
        ));
    return Future.value(false);
  }

  void _onResetPassword() {
    print("Reset Password");
    _email = _emailcontroller.text;
    if (_isEmailValid(_email)) {
      ProgressDialog pr = new ProgressDialog(context,
          type: ProgressDialogType.Normal, isDismissible: false);
      pr.style(message: "Sending link to your email.");
      pr.show();
      http.post(urlPass, body: {
        "Email": _email,
      }).then((res) {
        print(res.statusCode);
        Toast.show(res.body, context,
            duration: Toast.LENGTH_LONG, gravity: Toast.BOTTOM);
        pr.dismiss();
      }).catchError((err) {
        print(err);
      });
    } else {
      Toast.show("Check your reset password in email", context,
          duration: Toast.LENGTH_LONG, gravity: Toast.BOTTOM);
    }
  }

  bool _isEmailValid(String email) {
    return RegExp(r"^[a-zA-Z0-9.]+@[a-zA-Z0-9]+\.[a-zA-Z]+").hasMatch(email);
  }
}
