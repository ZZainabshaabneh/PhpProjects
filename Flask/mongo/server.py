from flask import Flask,Response,request
import pymongo
import json
from bson.objectid import ObjectId #which is the data format used by MongoDB.
00


@app.route("/users", methods=['GET'])
def Get_users():
    try:
       data=list(db.users.find())
       for user in data:
           user['_id']=str(user['_id'])
       return Response(
           response=json.dumps(data),
           status=500,
           mimetype="application/json"
       )
    except Exception as ex:
        print("********")
        print(ex)
        return Response(response= json.dumps({"message":"Can't Read the employee!"}),status=500,mimetype="application/json")

@app.route("/users/<id>", methods=['GET'])
def Get_Oneuser(id):
    try:
       data=list(db.users.find())
       for user in data:
           user['_id']=str(user['_id'])
       return Response(
           response=json.dumps(user),
           status=500,
           mimetype="application/json"
       )
    except Exception as ex:
        print("********")
        print(ex)
        return Response(response= json.dumps({"message":"Can't Read the employee!"}),status=500,mimetype="application/json")
    
    
@app.route("/users", methods=['POST'])
def create_user():
    try:
        user={
            "Name":request.form["Name"],
            "Company":request.form["Company"],
            "Title":request.form["Title"],
            "Gender":request.form["Gender"],
            "Age":request.form["Age"],
            "Salary":request.form["Salary"],
            "Experience":request.form["Experience"]
            
            }
        dbResponse=db.users.insert_one(user)
        print(dbResponse.inserted_id)
        return Response(
            response= json.dumps({"message":"well done user created!","id":f"{dbResponse.inserted_id}"}),
            status=200,
            mimetype="application/json"
        )
    except Exception as ex:
        print("********")
        print(ex)
        print("********")
        
#######################################################
@app.route("/users/<id>", methods=['PATCH'])
def update_user(id):
    try:
        # Update user's name based on the provided ID
        update_data = {}
        if 'Name' in request.form:
            update_data['Name'] = request.form['Name']
        if 'Company' in request.form:
            update_data['Company'] = request.form['Company']
        if 'Title' in request.form:
            update_data['Title'] = request.form['Title']
        if 'Gender' in request.form:
            update_data['Gender'] = request.form['Gender']
        if 'Age' in request.form:
            update_data['Age'] = request.form['Age']
        if 'Salary' in request.form:
            update_data['Salary'] = request.form['Salary']
        if 'Experience' in request.form:
            update_data['Experience'] = request.form['Experience']

        # Only proceed with the update if there are fields to update
        if update_data:
            dbResponse = db.users.update_one(
                {"_id": ObjectId(id)},
                {"$set": update_data}
            )
        if dbResponse.modified_count == 1:
            return Response(
                response=json.dumps({"message": "User updated successfully!"}),
                status=200,  # Success status code
                mimetype="application/json"
            )
        else:
            # Return this message if no user was updated (e.g., user not found)
            return Response(
                response=json.dumps({"message": "No changes made."}),
                status=200,  # Success status code still, because it's not an error
                mimetype="application/json"
            )
    except Exception as ex:
        print(ex)
        # Return error message if operation fails
        return Response(
            response=json.dumps({"message": "Failed to update user!"}),
            status=500,  # Error status code
            mimetype="application/json"
        )
        
#######################################################
@app.route("/users/<id>", methods=['DELETE'])
def delete_user(id):
    try:
        
        dbResponse=db.users.delete_one({"_id":ObjectId(id)})
        if dbResponse.deleted_count == 1:
            return Response(
                response=json.dumps({"message": "User Deleted successfully!","id":f"{id}"}),
                status=200,  # Success status code
                mimetype="application/json"
            )
        
        return Response(
                response=json.dumps({"message": "Not exist."}),
                status=200,  # Success status code still, because it's not an error
                mimetype="application/json"
            )
    except Exception as ex:
        print("********")
        print(ex)
        print("********")
        return Response(
            response=json.dumps({"message": "Failed to Delete user!"}),
            status=500,  # Error status code
            mimetype="application/json"
        )
    
    
    
    
    
    
if __name__ == "__main__":
    app.run(debug=True)
