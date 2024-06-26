#!/bin/bash

echo "Generating Python gRPC code from proto files..."
python -m grpc_tools.protoc -I protos/ --python_out=cmd/scraper/ --grpc_python_out=cmd/scraper protos/recipe.proto
if [ $? -eq 0 ]; then
    echo "Python gRPC code generation successful."
else
    echo "Python gRPC code generation failed."
    exit 1
fi

echo "Generating Go gRPC code from proto files..."
protoc --go_out=internal --go_opt=paths=source_relative --go-grpc_out=internal --go-grpc_opt=paths=source_relative protos/recipe.proto
if [ $? -eq 0 ]; then
    echo "Go gRPC code generation successful."
else
    echo "Go gRPC code generation failed."
    exit 1
fi

echo "All proto compilations completed successfully."