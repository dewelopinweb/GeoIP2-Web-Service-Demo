GeoIP2 Web Service Demo
----------------------
Frontend based on [Next.js](https://github.com/vercel/next.js/)

Backend based on [Slim Framework](https://github.com/slimphp/Slim)

Interaction between frontend and backend via HTTP API.

Needed tools:
- Docker
- make

Application execution:
1. Build application command: `make build`
2. Run application command: `make start`
3. Open http://localhost:3000. If the application runs successfully you will see the form
4. Enter one or more ip for lookup
5. Run `make stop` to stop the Docker container
