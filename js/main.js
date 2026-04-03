

// ==================== DONNÉES ====================
const gamesData = [
    // ========== JEUX EXISTANTS (AVEC leS IMAGES LOCALES : pour la bd ) ==========
    {
        numJeu: 4572,
        name: "FINAL FANTASY IV",
        description: "Un RPG culte de Square, révolutionnaire avec son système ATB. Version originale SNES de 1991.",
        platforms: ["SNES", "Playstation", "WonderSwan Color", "GBA", "PSP"],
        rating: 8.5,
        versionsCount: 4,
        dateSortie: "1991",
        genre: "JRPG",
        developpeur: "Square",
        coverImage: "images/ffiv_cover_art_original.jpg"
    },
    {
        numJeu: 858,
        name: "FINAL FANTASY VII",
        description: "Un RPG culte de Square Enix, révolutionnaire par ses graphismes 3D et son scénario émouvant.",
        platforms: ["Playstation", "PC", "Playstation 4", "Playstation 5"],
        rating: 9.2,
        versionsCount: 3,
        dateSortie: "1997",
        genre: "JRPG",
        developpeur: "Square Enix",
        coverImage: "images/final-fantasy-vii-playstation-front-cover.jpg"
    },
    {
        numJeu: 3549,
        name: "THE LEGEND OF ZELDA OOT",
        description: "L'aventure 3D de Nintendo qui a redéfini le genre action-aventure.",
        platforms: ["Nintendo 64", "3DS", "PC"],
        rating: 9.9,
        versionsCount: 3,
        dateSortie: "1998",
        genre: "Aventure",
        developpeur: "Nintendo",
        coverImage: "images/the-legend-of-zelda-ocarina-of-time-nintendo-64-front-cover.jpg"
    },
    {
        numJeu: 52872,
        name: "RESIDENT EVIL 4",
        description: "Un TPS légendaire qui a révolutionné le survival-horror.",
        platforms: ["GameCube", "Playstation 2", "PC", "Playstation 4", "Playstation 5"],
        rating: 9.3,
        versionsCount: 2,
        dateSortie: "2005",
        genre: "TPS",
        developpeur: "Capcom",
        coverImage: "images/resident-evil-4-gamecube-front-cover.jpg"
    },

    // ==========  JEUX en js  ==========
    {
        numJeu: 1001,
        name: "CHRONO TRIGGER",
        description: "Un RPG temporel légendaire mêlant aventures et voyages dans le temps. Chef-d'œuvre de Square.",
        platforms: ["SNES", "DS", "PC", "Mobile"],
        rating: 9.8,
        versionsCount: 4,
        dateSortie: "1995",
        genre: "JRPG",
        developpeur: "Square",
        coverImage: "images/chrono.png"
    },
    {
        numJeu: 1002,
        name: "SUPER MARIO 64",
        description: "Le premier Mario en 3D qui a révolutionné le jeu de plateforme.",
        platforms: ["Nintendo 64", "DS", "Switch"],
        rating: 9.7,
        versionsCount: 3,
        dateSortie: "1996",
        genre: "Platformer",
        developpeur: "Nintendo",
        coverImage: "images/mario.jpg"
    },
    {
        numJeu: 1003,
        name: "METAL GEAR SOLID",
        description: "Le jeu d'infiltration qui a redéfini le genre et introduit le cinéma dans le jeu vidéo.",
        platforms: ["Playstation", "PC", "PS3", "PS Vita"],
        rating: 9.5,
        versionsCount: 5,
        dateSortie: "1998",
        genre: "Infiltration",
        developpeur: "Konami",
        coverImage: "images/metal.jpg"
    },
    {
        numJeu: 1004,
        name: "SHENMUE",
        description: "Le pionnier des open-world modernes et des QTE.",
        platforms: ["Dreamcast", "Xbox", "PC", "PS4"],
        rating: 8.9,
        versionsCount: 4,
        dateSortie: "1999",
        genre: "Aventure",
        developpeur: "Sega",
        coverImage: "images/Shenmue.jpg"
    },
    {
        numJeu: 1005,
        name: "HALF-LIFE 2",
        description: "Un FPS révolutionnaire avec son moteur physique Source et son histoire immersive.",
        platforms: ["PC", "Xbox", "PS3", "Android"],
        rating: 9.6,
        versionsCount: 5,
        dateSortie: "2004",
        genre: "FPS",
        developpeur: "Valve",
        coverImage: "images/half.jpg"
    },
    {
        numJeu: 1006,
        name: "SHADOW OF THE COLOSSUS",
        description: "Un chef-d'œuvre artistique où vous affrontez des colosses gigantesques.",
        platforms: ["PS2", "PS3", "PS4", "PC"],
        rating: 9.7,
        versionsCount: 4,
        dateSortie: "2005",
        genre: "Action-Aventure",
        developpeur: "Team Ico",
        coverImage: "images/shadow.jpg"
    },
    {
        numJeu: 1007,
        name: "PERSONA 5",
        description: "Un JRPG stylisé mêlant simulation sociale et combat au tour par tour.",
        platforms: ["PS3", "PS4", "PC", "Switch", "Xbox"],
        rating: 9.4,
        versionsCount: 3,
        dateSortie: "2016",
        genre: "JRPG",
        developpeur: "Atlus",
        coverImage: "images/persona.jpg"
    },
    {
        numJeu: 1008,
        name: "ELDEN RING",
        description: "Le jeu de l'année 2022, un open-world dark fantasy de FromSoftware.",
        platforms: ["PC", "PS4", "PS5", "Xbox One", "Xbox Series"],
        rating: 9.8,
        versionsCount: 2,
        dateSortie: "2022",
        genre: "Action-RPG",
        developpeur: "FromSoftware",
        coverImage: "images/elden.jpg"
    }
];

const ffivVersions = [
    { numVersion: 20, name: "Final Fantasy II (Original)", year: 1991, type: "Original", rating: 8.5, original: true },
    { numVersion: 21, name: "Remake 3D", year: 2007, type: "Remake", rating: 8.0, original: false },
    { numVersion: 22, name: "Pixel Remaster", year: 2021, type: "Remaster", rating: 8.8, original: false }
];

const ffivPortages = [
    { plateforme: "SNES", resolution: "256x224", framerate: 60, stable: true, lagSup: false, dateSortie: "1991", note: 8 },
    { plateforme: "Playstation", resolution: "256x224", framerate: 60, stable: true, lagSup: true, dateSortie: "1997", note: 7 },
    { plateforme: "GBA", resolution: "240x160", framerate: 60, stable: true, lagSup: false, dateSortie: "2005", note: 8 },
    { plateforme: "PSP", resolution: "480x272", framerate: 60, stable: true, lagSup: false, dateSortie: "2011", note: 9 }
];

const ffivChangeLocale = [
    { type: "Censure", description: "Dancers habillés (au lieu de bikinis)" },
    { type: "Censure", description: "Pas de baiser entre Cecil et Rosa" },
    { type: "Censure", description: "Suppression des gros mots" },
    { type: "Gameplay", description: "La difficulté du jeu a été réduite" }
];

const strengths = {
    4572: ["Système ATB révolutionnaire", "Histoire émouvante", "Bande sonore mémorable"],
    858: ["Bande sonore légendaire", "Histoire épique", "Innovation technique 3D"],
    3549: ["Gameplay 3D innovant", "Donjons variés", "Musique culte"],
    52872: ["Gameplay nerveux", "Atmosphère tendue", "Boss mémorables"]
};

const weaknesses = {
    4572: ["Traduction approximative", "Difficulté inégale", "Certains bugs"],
    858: ["Graphismes datés", "Traduction approximative", "Rythme lent"],
    3549: ["Graphismes limités", "Temple de l'Eau frustrant"],
    52872: ["Quick Time Events", "Moins horrifique"]
};

// ==================== MOBILE MENU ====================
const mobileBtn = document.querySelector('.mobile-menu-btn');
const navLinks = document.querySelector('.nav-links');
if (mobileBtn) {
    mobileBtn.addEventListener('click', () => { navLinks.classList.toggle('show'); });
}

// ==================== COUNTERS ====================
function animateCounters() {
    document.querySelectorAll('.stat-number').forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        if (isNaN(target)) return;
        let current = 0;
        const update = () => {
            current += target / 50;
            if (current < target) { counter.textContent = Math.floor(current); requestAnimationFrame(update); }
            else { counter.textContent = target; }
        };
        update();
    });
}

// ==================== GAMES GRID ====================
function generateGamesGrid() {
    const grid = document.getElementById('gamesGrid');
    if (!grid) return;
    grid.innerHTML = gamesData.map(game => `
        <div class="game-card" onclick="window.location.href='jeu-detail.html?id=${game.numJeu}'">
            <div class="game-card-image"><img src="${game.coverImage}" alt="${game.name}" style="width:100%; height:100%; object-fit:cover;"></div>
            <div class="game-card-content">
                <h3>${game.name}</h3>
                <p>${game.description.substring(0, 80)}...</p>
                <div class="game-platforms">${game.platforms.map(p => `<span>${p}</span>`).join('')}</div>
                <div class="game-footer">
                    <span class="game-rating">⭐ ${game.rating}/10</span>
                    <span class="game-versions">📦 ${game.versionsCount} versions</span>
                    <button class="btn-detail">Voir détails</button>
                </div>
            </div>
        </div>
    `).join('');
}

// ==================== URL PARAM ====================
function getJeuIdFromURL() {
    const params = new URLSearchParams(window.location.search);
    return params.get('id');
}

// ==================== JEU DETAIL ====================
function generateGameDetail(jeuId) {
    const jeu = gamesData.find(g => g.numJeu == jeuId);
    if (!jeu) return;
    
    document.title = `GameVersus - ${jeu.name}`;
    const img = document.getElementById('jeuCoverImage');
    if (img) img.src = jeu.coverImage;
    const nom = document.getElementById('jeuNom');
    if (nom) nom.textContent = jeu.name;
    const desc = document.getElementById('jeuDescription');
    if (desc) desc.textContent = jeu.description;
    const annee = document.getElementById('jeuAnnee');
    if (annee) annee.innerHTML = `<i class="fas fa-calendar"></i> ${jeu.dateSortie}`;
    const genre = document.getElementById('jeuGenre');
    if (genre) genre.innerHTML = `<i class="fas fa-tag"></i> ${jeu.genre}`;
    const dev = document.getElementById('jeuDeveloppeur');
    if (dev) dev.innerHTML = `<i class="fas fa-building"></i> ${jeu.developpeur}`;
    const note = document.getElementById('jeuNote');
    if (note) note.textContent = `${jeu.rating}/10`;
    const nbVersions = document.getElementById('jeuNbVersions');
    if (nbVersions) nbVersions.textContent = jeu.versionsCount;
    const nbPlateformes = document.getElementById('jeuNbPlateformes');
    if (nbPlateformes) nbPlateformes.textContent = jeu.platforms.length;
    const plateformesDiv = document.getElementById('jeuPlateformes');
    if (plateformesDiv) plateformesDiv.innerHTML = jeu.platforms.map(p => `<span class="plateforme"><i class="fas fa-gamepad"></i> ${p}</span>`).join('');
    
    generateRanking(jeuId);
    generateScores();
    generateStrengthsWeaknesses(jeuId);
    generateChanges();
    generatePortageTable();
    generateTimeline();
}

function generateRanking(jeuId) {
    const container = document.getElementById('rankingList');
    if (!container) return;
    container.innerHTML = ffivVersions.map((v, i) => `
        <div class="ranking-item ${i === 0 ? 'first' : ''}">
            <div class="rank">${i+1}</div>
            <div class="version-info">
                <h3>${v.name}</h3>
                <span class="year">${v.year}</span>
                ${v.original ? '<span class="tag-original">Original</span>' : ''}
                <span class="version-type">${v.type}</span>
            </div>
            <div class="rating">${v.rating} <i class="fas fa-star"></i></div>
        </div>
    `).join('');
}

function generateScores() {
    const container = document.getElementById('scoresList');
    if (!container) return;
    container.innerHTML = `
        <div class="score-item"><span>Graphismes</span><div class="progress-bar"><div class="progress" style="width: 70%"></div></div><span>7.0/10</span></div>
        <div class="score-item"><span>Audio</span><div class="progress-bar"><div class="progress" style="width: 85%"></div></div><span>8.5/10</span></div>
        <div class="score-item"><span>Performance</span><div class="progress-bar"><div class="progress" style="width: 90%"></div></div><span>9.0/10</span></div>
        <div class="score-item"><span>Gameplay</span><div class="progress-bar"><div class="progress" style="width: 85%"></div></div><span>8.5/10</span></div>
    `;
}

function generateStrengthsWeaknesses(jeuId) {
    const strengthsDiv = document.getElementById('strengthsList');
    const weaknessesDiv = document.getElementById('weaknessesList');
    if (strengthsDiv) strengthsDiv.innerHTML = (strengths[jeuId] || strengths[4572]).map(s => `<li><i class="fas fa-check-circle"></i> ${s}</li>`).join('');
    if (weaknessesDiv) weaknessesDiv.innerHTML = (weaknesses[jeuId] || weaknesses[4572]).map(w => `<li><i class="fas fa-exclamation-triangle"></i> ${w}</li>`).join('');
}

function generateChanges() {
    const container = document.getElementById('changesGrid');
    if (!container) return;
    container.innerHTML = `
        <div class="change-card censorship"><h3><i class="fas fa-ban"></i> Censures (Version USA)</h3><ul>${ffivChangeLocale.map(c => `<li>❌ ${c.description}</li>`).join('')}</ul></div>
        <div class="change-card restored"><h3><i class="fas fa-check-circle"></i> Version Originale (Japon)</h3><ul><li>✅ Contenu non censuré</li><li>✅ Dialogues originaux</li></ul></div>
        <div class="change-card easter"><h3><i class="fas fa-mask"></i> "You spoony bard!"</h3><p>Célèbre erreur de traduction où Tellah traite Edward de "spoony bard".</p></div>
    `;
}

function generatePortageTable() {
    const container = document.getElementById('portageTableBody');
    if (!container) return;
    container.innerHTML = ffivPortages.map(p => `
        <tr>
            <td><strong>${p.plateforme}</strong></td>
            <td>${p.resolution}</td>
            <td>${p.framerate} fps</td>
            <td>${p.stable ? '✅' : '⚠️'}</td>
            <td>${p.lagSup ? '⚠️' : '✅'}</td>
            <td>${p.dateSortie}</td>
            <td><span class="rating">${p.note}/10</span></td>
        </tr>
    `).join('');
}

function generateTimeline() {
    const container = document.getElementById('timeline');
    if (!container) return;
    container.innerHTML = ffivVersions.map(v => `
        <div class="timeline-item"><div class="timeline-dot"></div><div class="timeline-content"><h3>${v.name}</h3><p>${v.type}</p><span>${v.year}</span></div></div>
    `).join('');
}

function initJeuDetail() {
    const id = getJeuIdFromURL();
    if (id) generateGameDetail(parseInt(id));
}

// ==================== SLIDER ====================
function initSlider() {
    const slider = document.getElementById('sliderInput');
    const afterImage = document.querySelector('.slider-image-after');
    if (slider && afterImage) {
        slider.addEventListener('input', (e) => { afterImage.style.width = `${e.target.value}%`; });
        afterImage.style.width = "50%";
    }
}

// ==================== FAQ ====================
function initFaq() {
    document.querySelectorAll('.faq-question').forEach(q => {
        q.addEventListener('click', () => {
            q.classList.toggle('active');
            const answer = q.nextElementSibling;
            if (answer) answer.classList.toggle('show');
        });
    });
}

// ==================== FORMS ====================
// ==================== FORMS ====================
function initForms() {
    const contactForm = document.getElementById('contactForm');
    if (contactForm) contactForm.addEventListener('submit', (e) => { e.preventDefault(); alert('📧 Message envoyé !'); contactForm.reset(); });
}



// ==================== EFFET 3D (MANETTE QUI TOURNE) ====================
function init3D() {
    const canvas = document.getElementById('heroCanvas');
    if (!canvas) {
        console.log("Canvas 3D non trouvé sur cette page");
        return;
    }
    
    console.log("Initialisation de l'effet 3D...");
    
    canvas.innerHTML = '';
    
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(45, 1, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true });
    
    const size = Math.min(window.innerWidth * 0.4, 400);
    renderer.setSize(size, size);
    renderer.setClearColor(0x000000, 0);
    canvas.appendChild(renderer.domElement);
    
    const controller = new THREE.Group();
    
    const bodyGeo = new THREE.BoxGeometry(2.2, 0.4, 1.5);
    const bodyMat = new THREE.MeshStandardMaterial({ color: 0x00d2ff, emissive: 0x004466, metalness: 0.7, roughness: 0.3 });
    const body = new THREE.Mesh(bodyGeo, bodyMat);
    body.castShadow = true;
    controller.add(body);
    
    const topGeo = new THREE.BoxGeometry(1.8, 0.1, 1.2);
    const topMat = new THREE.MeshStandardMaterial({ color: 0x33ccff, metalness: 0.5 });
    const topPart = new THREE.Mesh(topGeo, topMat);
    topPart.position.y = 0.25;
    controller.add(topPart);
    
    const gripGeo = new THREE.BoxGeometry(0.5, 0.3, 0.8);
    const gripMat = new THREE.MeshStandardMaterial({ color: 0x00aadd });
    const leftGrip = new THREE.Mesh(gripGeo, gripMat);
    leftGrip.position.set(-1.2, -0.2, 0);
    leftGrip.rotation.z = 0.3;
    controller.add(leftGrip);
    
    const rightGrip = new THREE.Mesh(gripGeo, gripMat);
    rightGrip.position.set(1.2, -0.2, 0);
    rightGrip.rotation.z = -0.3;
    controller.add(rightGrip);
    
    const crossMat = new THREE.MeshStandardMaterial({ color: 0x888888 });
    const crossH = new THREE.Mesh(new THREE.BoxGeometry(0.7, 0.1, 0.2), crossMat);
    crossH.position.set(-0.7, 0.1, 0.6);
    controller.add(crossH);
    
    const crossV = new THREE.Mesh(new THREE.BoxGeometry(0.2, 0.7, 0.2), crossMat);
    crossV.position.set(-0.7, 0.1, 0.6);
    controller.add(crossV);
    
    const buttonMat = new THREE.MeshStandardMaterial({ color: 0xff3366 });
    const positions = [[0.5, 0.6], [0.8, 0.5], [0.5, 0.4], [0.8, 0.4]];
    positions.forEach(pos => {
        const btn = new THREE.Mesh(new THREE.SphereGeometry(0.12, 16, 16), buttonMat);
        btn.position.set(pos[0], 0.1, pos[1]);
        controller.add(btn);
    });
    
    const stickMat = new THREE.MeshStandardMaterial({ color: 0x666666 });
    const leftStickBase = new THREE.Mesh(new THREE.CylinderGeometry(0.18, 0.2, 0.08, 16), stickMat);
    leftStickBase.position.set(-0.8, 0.15, -0.5);
    controller.add(leftStickBase);
    
    const leftStickTop = new THREE.Mesh(new THREE.SphereGeometry(0.12, 16, 16), stickMat);
    leftStickTop.position.set(-0.8, 0.22, -0.5);
    controller.add(leftStickTop);
    
    const rightStickBase = new THREE.Mesh(new THREE.CylinderGeometry(0.18, 0.2, 0.08, 16), stickMat);
    rightStickBase.position.set(0.8, 0.15, -0.5);
    controller.add(rightStickBase);
    
    const rightStickTop = new THREE.Mesh(new THREE.SphereGeometry(0.12, 16, 16), stickMat);
    rightStickTop.position.set(0.8, 0.22, -0.5);
    controller.add(rightStickTop);
    
    const ledMat = new THREE.MeshStandardMaterial({ color: 0xff0000, emissive: 0x440000 });
    const led = new THREE.Mesh(new THREE.SphereGeometry(0.08, 8, 8), ledMat);
    led.position.set(0, 0.05, 0.8);
    controller.add(led);
    
    scene.add(controller);
    
    const mainLight = new THREE.DirectionalLight(0xffffff, 1);
    mainLight.position.set(2, 3, 4);
    scene.add(mainLight);
    
    const fillLight = new THREE.PointLight(0x00d2ff, 0.5);
    fillLight.position.set(1, 2, 2);
    scene.add(fillLight);
    
    scene.add(new THREE.AmbientLight(0x404060));
    
    const backLight = new THREE.PointLight(0xff66cc, 0.3);
    backLight.position.set(-1, 1, -2);
    scene.add(backLight);
    
    camera.position.z = 3.5;
    camera.position.y = 0.3;
    camera.lookAt(0, 0, 0);
    
    const particleCount = 800;
    const particlesGeo = new THREE.BufferGeometry();
    const particlesPos = [];
    for (let i = 0; i < particleCount; i++) {
        particlesPos.push((Math.random() - 0.5) * 15);
        particlesPos.push((Math.random() - 0.5) * 8);
        particlesPos.push((Math.random() - 0.5) * 12 - 4);
    }
    particlesGeo.setAttribute('position', new THREE.BufferAttribute(new Float32Array(particlesPos), 3));
    const particlesMat = new THREE.PointsMaterial({ color: 0x00d2ff, size: 0.04, transparent: true, opacity: 0.4 });
    const particles = new THREE.Points(particlesGeo, particlesMat);
    scene.add(particles);
    
    let time = 0;
    function animate() {
        requestAnimationFrame(animate);
        time += 0.012;
        
        controller.rotation.y = Math.sin(time * 0.3) * 0.5;
        controller.rotation.x = Math.sin(time * 0.5) * 0.15;
        controller.rotation.z = Math.cos(time * 0.4) * 0.1;
        
        const intensity = 0.3 + Math.sin(time * 5) * 0.2;
        ledMat.emissiveIntensity = intensity;
        
        particles.rotation.y += 0.002;
        particles.rotation.x += 0.001;
        
        renderer.render(scene, camera);
    }
    animate();
    
    window.addEventListener('resize', () => {
        const newSize = Math.min(window.innerWidth * 0.4, 400);
        renderer.setSize(newSize, newSize);
    });
}

// ==================== INIT ====================
document.addEventListener('DOMContentLoaded', () => {
    generateGamesGrid();
    animateCounters();
    initSlider();
    initFaq();
    initForms();
    if (document.getElementById('heroCanvas')) init3D();
    if (window.location.pathname.includes('jeu-detail.html')) initJeuDetail();
});