# Use the official Node.js image as the base
FROM node:18

# Set the working directory
WORKDIR /app

# Install chokidar-cli globally
RUN npm install -g chokidar-cli

# Set the SHELL environment variable
ENV SHELL=/bin/bash

# Copy your application files (optional)
COPY . .

# Set the default command to display chokidar-cli usage
CMD ["chokidar", "--help"]
