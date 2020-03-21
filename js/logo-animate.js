$(document).ready(function() {
  var Engine = Matter.Engine,
    Render = Matter.Render,
    Runner = Matter.Runner,
    Common = Matter.Common,
    MouseConstraint = Matter.MouseConstraint,
    Mouse = Matter.Mouse,
    World = Matter.World,
    Vertices = Matter.Vertices,
    Svg = Matter.Svg,
    Bodies = Matter.Bodies,
    Body = Matter.Body,
    Composite = Matter.Composite,
    Composites = Matter.Composites,
    Constraint = Matter.Constraint;

  // create engine
  var engine = Engine.create(),
    world = engine.world;

  var clientWidth = document.documentElement.clientWidth;

  // create renderer
  var render = Render.create({
    element: document.body,
    engine: engine,
    options: {
      width: clientWidth,
      height: 800,
      background: "transparent",
      wireframeBackground: "transparent",
      wireframes: false
      // showAngleIndicator: true,
      // showCollisions: true,
      // showVelocity: true
    }
  });

  Render.run(render);

  // create runner
  var runner = Runner.create();
  Runner.run(runner, engine);

  var group = Body.nextGroup(true);

  $.get("./wp-content/themes/gogoplastics/img/logo-animate.svg").done(function(
    data
  ) {
    var vertexSets = [],
      color = Common.choose(["#ffffff"]);

    $(data)
      .find("path")
      .each(function(i, path) {
        vertexSets.push(
          Vertices.scale(Svg.pathToVertices(path, 22.1), 0.3, 0.3)
        );
      });

    var ropeB = Composites.stack(
      clientWidth / 1.4,
      -200,
      1,
      1,
      20,
      20,
      function(x, y) {
        return Bodies.fromVertices(
          x,
          y,
          vertexSets,
          {
            collisionFilter: { group: group },
            chamfer: 5,
            render: {
              fillStyle: color,
              strokeStyle: color,
              lineWidth: 1
            }
          },
          true
        );
      }
    );

    Composites.chain(ropeB, 0, 0, 0, {
      stiffness: 0.8,
      length: 2,
      render: { type: "line" }
    });
    Composite.add(
      ropeB,
      Constraint.create({
        bodyB: ropeB.bodies[0],
        pointB: { x: 0, y: -170 },
        pointA: {
          x: ropeB.bodies[0].position.x - 450,
          y: ropeB.bodies[0].position.y - 330
        },
        stiffness: 0.01,
        // length: 300,
        // damping: 0.5,
        render: {
          lineWidth: 0,
          anchors: false
        }
      })
    );

    World.add(world, [ropeB]);
  });

  //   // add mouse control
  //   var mouse = Mouse.create(render.canvas),
  //     mouseConstraint = MouseConstraint.create(engine, {
  //       mouse: mouse,
  //       constraint: {
  //         stiffness: 0.01,
  //         damping: 0.5,
  //         render: {
  //           visible: false
  //         }
  //       }
  //     });

  //   World.add(world, mouseConstraint);

  // keep the mouse in sync with rendering
  //   render.mouse = mouse;

  Engine.run(engine);
  Render.run(render);
});
