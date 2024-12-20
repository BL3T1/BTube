
# The Image that we want to use.
FROM node:alpine

# Copy the files from the project to the app folder in the alpine image.
COPY . /app

# Set the work directory to the folder which we copy the project into it.
WORKDIR /app

