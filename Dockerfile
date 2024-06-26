FROM ubuntu:24.04

RUN apt update && apt install -y \
    software-properties-common \
    protobuf-compiler