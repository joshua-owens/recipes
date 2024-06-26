# Recipes

## Requirements
- [docker](https://www.docker.com/)
- [devcontainers cli](https://github.com/devcontainers/cli)

## Dev Container

The devcontainer is a separate container from the apps that includes all the required tools to work on this project. This includes the following:

- [python](https://github.com/devcontainers/features/tree/main/src/python)
- [go](https://github.com/devcontainers/features/tree/main/src/go)
- [node](https://github.com/devcontainers/features/tree/main/src/node)
- [protoc](https://grpc.io/docs/protoc-installation/)
- [goose](https://github.com/pressly/goose)
- [sqlc](https://github.com/sqlc-dev/sqlc)

### devcontainer cli

It would be helpful to set up an alias for running devcontainer cli commands in your `~/.zshrc` or `~/.bashrc` file

```
dc() {
  devcontainer $1 --workspace-folder . ${@:2}
}
```

This will reduce the amount of typing required to run commands:

```
dc exec bash
```

### npm

Watch files:

```
devcontainer exec --workspace-folder . npm run dev
```

Build:

```
devcontainer exec --workspace-folder . npm run build
```

### goose

Goose commands can be run with the following format:

```bash
devcontainer exec --workspace-folder . goose --dir migrations postgres "host=db user=postgres password=postgres dbname=recipes sslmode=disable" [COMMAND]
```

### sqlc

```
devcontainer exec --workspace-folder . sqlc [COMMAND]
```

### protoc 

Compile protobufs for the python server and go client:

```
devcontainer exec --workspace-folder . scripts/proto.sh
```