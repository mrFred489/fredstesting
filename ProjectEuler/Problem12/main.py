# usr/bin/python3

def getTriangle(num):
	triangle = 0
	for natNum in range(1,num):
		triangle += natNum

	return triangle

print(getTriangle(7))