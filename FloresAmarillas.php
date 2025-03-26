<svg id="campoFlores" width="100%" height="500px" style="background: #F0FFF0;"></svg>

<script>
  const svg = document.getElementById('campoFlores');
  let contadorFlores = 0;
  const maxFlores = 10; // Cambia este número si quieres más/menos flores antes del mensaje

  function crearFlor(x, y) {
    contadorFlores++;
    
    const flor = document.createElementNS('http://www.w3.org/2000/svg', 'g');
    flor.setAttribute('transform', `translate(${x},${y})`);
    
    // Pétalos (12 pétalos radiales)
    for(let i = 0; i < 12; i++) {
      const petalo = document.createElementNS('http://www.w3.org/2000/svg', 'ellipse');
      petalo.setAttribute('rx', '40');
      petalo.setAttribute('ry', '60');
      petalo.setAttribute('fill', i % 2 ? '#FFD700' : '#FFEC8B');
      petalo.setAttribute('transform', `rotate(${i * 30})`);
      flor.appendChild(petalo);
    }
    
    // Centro
    const centro = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
    centro.setAttribute('r', '25');
    centro.setAttribute('fill', '#8B4513');
    flor.appendChild(centro);
    
    // Tallo
    const tallo = document.createElementNS('http://www.w3.org/2000/svg', 'path');
    tallo.setAttribute('d', `M0,0 L0,${150 + Math.random() * 100}`);
    tallo.setAttribute('stroke', '#228B22');
    tallo.setAttribute('stroke-width', '8');
    tallo.setAttribute('transform', 'translate(0,25)');
    flor.appendChild(tallo);
    
    svg.appendChild(flor);

    // Mostrar mensaje después de 10 flores
    if(contadorFlores === maxFlores) {
      mostrarMensaje();
    }
  }

  function mostrarMensaje() {
    const mensaje = document.createElementNS('http://www.w3.org/2000/svg', 'text');
    mensaje.setAttribute('x', '50%');
    mensaje.setAttribute('y', '50%');
    mensaje.setAttribute('font-size', '60');
    mensaje.setAttribute('fill', '#FF1493');
    mensaje.setAttribute('text-anchor', 'middle');
    mensaje.setAttribute('font-family', 'Arial, sans-serif');
    mensaje.setAttribute('font-weight', 'bold');
    mensaje.textContent = 'TE AMO 💛';
    
    // Fondo del mensaje
    const fondo = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
    fondo.setAttribute('x', '30%');
    fondo.setAttribute('y', '40%');
    fondo.setAttribute('width', '40%');
    fondo.setAttribute('height', '20%');
    fondo.setAttribute('fill', 'white');
    fondo.setAttribute('rx', '20');
    fondo.setAttribute('opacity', '0.8');
    
    svg.appendChild(fondo);
    svg.appendChild(mensaje);

    // Desactivar más clics después del mensaje
    svg.style.pointerEvents = 'none';
  }

  // Crear 3 flores iniciales
  crearFlor(150, 100);
  crearFlor(400, 150);
  crearFlor(650, 80);

  // Añadir flor al hacer clic
  svg.addEventListener('click', (e) => {
    if(contadorFlores < maxFlores) {
      crearFlor(
        e.clientX - svg.getBoundingClientRect().left, 
        e.clientY - svg.getBoundingClientRect().top
      );
    }
  });
</script>