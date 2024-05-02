from flask import Flask, render_template, jsonify, request
import pymongo  # Corrected import
from pymongo import MongoClient
import uuid
from passlib.hash import pbkdf2_sha256  # To encrypt password

app= Flask(__name__)

# Connect to the MongoDB, change the connection string per your MongoDB environment
client = pymongo.MongoClient("localhost",27017)

# Specify the database to be used
db = client.user_login_system

# Specify the collection to be used
collection = db.testcollection

@app.route('/')
def home():
    return render_template('index.html')

@app.route('/signin.html')
def login():
    return render_template('signin.html')

@app.route('/signup')
def signup():
    return render_template('signup.html')


@app.route('/about')
def about():
    return render_template('about.html')

@app.route('/blogger')
def blog():
    return render_template('blog.html')

@app.route('/tajweed')
def Tajweed():
    return render_template('tajweed.html')

@app.route('/Math')
def Math():
    return render_template('Math.html')

@app.route('/languges')
def languges():
    return render_template('languges.html')

@app.route('/Test')
def Test():
    return render_template('Test.html')


class Users:
    def signiup(self):
        user_data = request.form
        user = {
            "_id": uuid.uuid4().hex,  # Use hex for a shorter representation
            "name": user_data.get('name'),
            "email": user_data.get('email'),
            "password": user_data.get('password')
        }
        
        # Check for email address before encrypting the password or inserting the user
        if db.users.find_one({"email": user['email']}):
            return jsonify({"error": "Email already in use!"}), 400

        # Encrypt the password
        user['password'] = pbkdf2_sha256.encrypt(user['password'])

        # Insert the user into the database
        if db.users.insert_one(user):
            return jsonify(user), 200

        return jsonify({"error": "Signup failed!"}), 400


@app.route('/signup.html',methods=['POST'])
def signiup():
    return  Users().signiup()   
    
if __name__=='__main__':
    
    
    
    app.run(debug=True)