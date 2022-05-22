# Iskra
WordPress starter theme


## Requirements:
1. *Docker* 19.03.0+, use `docker -v`
 - install `Docker desktop`
 - for Windows install `Ubuntu LTS` (Microsoft Store)
2. *Node* 16.14.0+, use `node -v`
3. *Webpack* - if you don't have it already use `npm install -g yarn`

## Installation:
1. Create project directory and enter it
2. `git clone https://github.com/SIOnline/Iskra .` - clone repository
3. `docker-compose up -d` - setup environment
4. `yarn install` - install packages

## Commands:
- `yarn start` - start development with watcher active
- `yarn build` - build theme files
- `yarn dist` - build production directory to copy & paste
- `yarn block` - create a new block

## Environments
| Env & ports                         | Description                 |
| ----------------------------------- | --------------------------- |
| <http://localhost:8000>             | Local default               |
| <http://localhost:8001>             | Local, watching for changes |
| <http://localhost:8002>             | PhpMyAdmin                  |
| <>                                  | Staging                     |
| <>                                  | Production                  |