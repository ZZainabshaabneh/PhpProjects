from flask import Flask,render_template

app=Flask(__name__)
MySkills=[("HTML",90),("CSS",14),("JS",50),("MYSql",70)]
@app.route("/")
def homepage():
    return render_template("home.html",titlepage="Home",custom_css="home")
    
@app.route("/about")
def about():
    return render_template("about.html",titlepage="About",custom_css="about")

@app.route("/Add")
def Add():
    return render_template("add.html",titlepage="ADD")

@app.route("/skills")
def skills():
    return render_template("skills.html",titlepage="SKILLS",headerPage="My Skills Page",Descripction="Here My Skills ",skills=MySkills,custom_css="skills")
    
if __name__=="__main__":
    
    app.run(debug=True)