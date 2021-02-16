WhoPlusYou Coding Challenge	
City Planning REST API 
Overview of requirements:
	- City with streets
	- Streets with houses 
	- Houses can have people in it 
	- Only 1 car per household
	- Person has a name and age 
	- Car has license plate, brand, and color 

RESTful API: 
	- Fetch all ppl living in the city 
	- Fetch all cars when providing a particular street name
	- Fetch the owners of a vehicle when providing a license plate 
	- Fetch the full address and street of a house when providing a person's name 

Models:
	City
		- Name
		- Constraints: Name should be unique 
	Street 
		- Street name 
		- Constraints: Street name should be unique
		- City objects has a 1-to-many relationship with a Street object; 1 City object can be associated with multiple Street objects
	House
		- Address 
		- Constraint: Address should be unique
		- Street object has a 1-to-many relationship with a House object; 1 Street object can be associated with multiple House objects
	Person
		- First Name
		- Last Name 
		- Age 
		- Constraints: No constraints (or maybe there should be? An id computed using all the 3 properties?)
		- House object has a 1-to-many relationship with a House object; 
		- Address of a household(a household can have more than 1 person object: 1-to-many)
	Car
		- License plate
		- Brand 
		- Color
		- Constraints: License plate should be unique
		- Car object has a 1-to-many relationship with a Person object; 1 Car object can be associated with multiple People objects

Use Cases:
	- Fetch all ppl living in the city: List of people living in an city. Person -> Houses -> Street -> City 
	Perform a join on the following: Person, Houses, Street, and City.
	- Fetch all cars when providing a particular street name:
	Join the following: Person, Houses, Car, Street. 
	Person ID, Household ID, Car ID, Street ID & Name 
	- Fetch the owners of a vehicle when providing a license plate.
	Join the following: Person, Household ID, and Car License Plate.
	- Fetch the full address and street of a house when providing a person's name 
	Join: Person Full Name & ID, Household Address & ID, Street Name & ID