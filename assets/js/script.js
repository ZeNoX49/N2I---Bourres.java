class Lasergame {
    constructor() {
        this.score = 0;
        this.hp = 100;
        this.timeLeft = 5;
        this.gameActive = false;
        this.enemies = document.querySelectorAll('.enemy, [data-enemy]');
        console.log('Lasergame chargé !', this.enemies.length, 'ennemis');
        this.init();
    }

    init() {
        const startBtn   = document.getElementById('start-game');
        const saveBtn    = document.getElementById('save-score');
        const restartBtn = document.getElementById('restart-game');
        const quitBtn    = document.getElementById('quit-game');

        if (startBtn)   startBtn.onclick   = () => this.startGame();
        if (saveBtn)    saveBtn.onclick    = () => this.saveScore();
        if (restartBtn) restartBtn.onclick = () => this.restartGame();
        if (quitBtn)    quitBtn.onclick    = () => this.quitGame();

        this.showLeaderboard();
    }



    startGame() {
        console.log('Démarrage');
        this.gameActive = true;
        document.body.classList.add('game-active');
        document.getElementById('game-ui').style.display = 'block';
        document.getElementById('start-game').style.display = 'none';
        document.getElementById('game-info').style.display = 'block';
        document.getElementById('weapon-cursor').style.display = 'block';

        document.addEventListener('mousemove', (e) => this.updateCursor(e));
        document.addEventListener('click', (e) => this.shoot(e));

        this.timer = setInterval(() => this.updateTimer(), 1000);
        this.riposteInterval = setInterval(() => this.enemyRiposte(), 2000);

        this.spawnInterval = setInterval(() => this.spawnEnemy(), 2000);

        for (let i = 0; i < 3; i++) this.spawnEnemy();
    }

    restartGame() {
        this.score     = 0;
        this.hp        = 100;
        this.timeLeft  = 60;
        this.gameActive = false;

        clearInterval(this.timer);
        clearInterval(this.riposteInterval);
        clearInterval(this.spawnInterval);

        document.getElementById('score').textContent  = '0';
        document.getElementById('hp').textContent     = '100';
        document.getElementById('timer').textContent  = '60';

        document.querySelectorAll('.enemy').forEach(e => e.remove());

        document.getElementById('game-over').style.display  = 'none';
        document.getElementById('save-score').style.display = 'block';
        const endButtons = document.getElementById('end-buttons');
        if (endButtons) endButtons.style.display = 'none';

        const input = document.getElementById('player-name');
        if (input) {
            input.disabled = false;
            input.value = '';
        }

        this.startGame();
    }


    updateCursor(e) {
        const cursor = document.getElementById('weapon-cursor');
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
    }

    shoot(e) {
        if (!this.gameActive) return;

        const cursor = document.getElementById('weapon-cursor');
        cursor.style.transform = 'translate(-50%,-50%) scale(1.3) rotate(10deg)';
        setTimeout(() => {
            cursor.style.transform = 'translate(-50%,-50%)';
        }, 150);

        const target = document.elementFromPoint(e.clientX, e.clientY);
        let enemyEl = target?.closest('.enemy, [data-enemy]');
        const enemyValue = enemyEl?.dataset?.enemy;

        if (enemyValue) {
            const points = parseInt(enemyValue);
            this.score += points;
            this.updateUI();

            enemyEl.classList.add('hit');
            setTimeout(() => enemyEl.classList.add('dead'), 500);
            console.log(`Touché +${points} Total: ${this.score}`);
        }
    }

    enemyRiposte() {
        if (!this.gameActive || Math.random() > 0.4) return;
        const aliveEnemies = Array.from(this.enemies).filter(el => !el.classList.contains('dead'));
        if (aliveEnemies.length > 0) {
            this.takeDamage(15);
            console.log('Counter');
        }
    }

    takeDamage(amount) {
        this.hp -= amount;
        document.body.classList.add('damage-flash');
        setTimeout(() => document.body.classList.remove('damage-flash'), 300);
        this.updateUI();
        if (this.hp <= 0) this.endGame();
    }

    updateTimer() {
        this.timeLeft--;
        this.updateUI();
        if (this.timeLeft <= 0) this.endGame();
    }


    updateUI() {
        document.getElementById('score').textContent = this.score;
        document.getElementById('hp').textContent = Math.max(0, this.hp);
        document.getElementById('timer').textContent = this.timeLeft;
    }

    endGame() {
        this.gameActive = false;
        clearInterval(this.timer);
        clearInterval(this.riposteInterval);
        clearInterval(this.spawnInterval);

        document.getElementById('final-score').textContent = this.score;
        document.getElementById('game-over').style.display = 'block';
    }



    saveScore() {
        const input = document.getElementById('player-name');
        const name  = (input.value || '').trim();

        if (!name) {
            alert('Merci de saisir un pseudo avant de continuer.');
            input.focus();
            return;
        }

        const payload = { name, score: this.score };

        fetch('/Bourrés.java/app/model/LasergameModel.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload),
        })


            .then(res => res.json())
            .then(data => {
                if (data.status !== 'ok') {
                    alert('Erreur enregistrement score');
                    return;
                }

                localStorage.setItem('lasergame-scores', JSON.stringify(data.scores));
                this.showLeaderboardFromArray(data.scores);

                document.getElementById('save-score').style.display = 'none';
                input.disabled = true;
                const endButtons = document.getElementById('end-buttons');
                if (endButtons) endButtons.style.display = 'block';
            })
            .catch(err => {
                console.error(err);
                alert('Erreur réseau pendant la sauvegarde du score');
            });
    }


    showLeaderboardFromArray(scores) {
        const div = document.getElementById('leaderboard');
        if (!div) return;

        div.innerHTML = scores.length
            ? scores.map(s => `<div>${s.name} : ${s.score} pts</div>`).join('')
            : 'Aucun score';
    }

    showLeaderboard() {
        const scores = JSON.parse(localStorage.getItem('lasergame-scores') || '[]');
        this.showLeaderboardFromArray(scores);
    }

    quitGame() {
        window.location.href = '/Bourrés.java/index.php?action=lasergame/show';
    }


    spawnEnemy() {
        if (!this.gameActive || this.timeLeft <= 0) return;

        const container = document.querySelector('.main') || document.body;

        const enemy = document.createElement('img');
        enemy.classList.add('enemy');
        enemy.dataset.enemy = String(50 + Math.floor(Math.random() * 151));
        enemy.src = 'assets/image/cible.png';
        enemy.style.position = 'absolute';

        const maxX = window.innerWidth - 150;
        const maxY = window.innerHeight - 200;
        const x = Math.floor(Math.random() * maxX);
        const y = Math.floor(Math.random() * maxY) + 80;

        enemy.style.left = x + 'px';
        enemy.style.top = y + 'px';

        container.appendChild(enemy);

        this.enemies = document.querySelectorAll('.enemy, [data-enemy]');
    }

}

new Lasergame();