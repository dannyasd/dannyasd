import java.awt.Color;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;

import javax.swing.JButton;
import javax.swing.JCheckBox;
import javax.swing.JFileChooser;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JRadioButton;
import javax.swing.JTextArea;
import javax.swing.JTextField;

public class LaberintoLoco extends JFrame implements ActionListener{
    Board board;

    JLabel[][] l;
        private JButton botoncrear;
        private JButton botonobst;
        private JButton botonrecorrer;
        private JButton botonimportar;
        private JButton botonexportar;
        private JButton botonsalir;
    private JMenuBar mb;    
    private JMenu menu1,menu2,menu3,menu4,menu5;
    public JMenuItem mi1,mi2,mi3,mi4,mi5,mi6,mi61,mi7,mi8,distnormal,distheur,distmax;
    private JCheckBox check;
  //  public int x;
   // public int y;

    public int g = 1;
    
    boolean salida;
    private JTextField textfield1,textfield2,textfield3,textfield4;
    private JLabel ancho,ancho2,alto,alto2,manual,obst,algoritmo,porcent;
    private JRadioButton alg1,alg2,alg3,alg4,porcen1,porcen2,porcen3;
    
    public LaberintoLoco() {
        setLayout(null);
        this.setExtendedState(this.MAXIMIZED_BOTH);//maximiza la pantalla
        
        //Tamaño de Tablero
        manual=new JLabel("Tamaño tablero");
        manual.setBounds(1000,10,100,30);
        add(manual);
        
        ancho=new JLabel("Ancho:");
        ancho.setBounds(1000,50,100,30);
        add(ancho);
        textfield1=new JTextField();
        textfield1.setBounds(1000,75,100,20);
        add(textfield1);
        
        alto=new JLabel("Alto:");
        alto.setBounds(1000,100,100,30);
        add(alto);
        textfield2=new JTextField();
        textfield2.setBounds(1000,125,100,20);
        add(textfield2);
        
        botoncrear=new JButton("Crear");
        botoncrear.setBounds(1000,150,100,30);
        add(botoncrear);
        botoncrear.addActionListener(this);
        
        //Colocar obtaculo manualmente
        obst=new JLabel("Poner obstáculo");
        obst.setBounds(1000,200,100,30);
        add(obst);
        
        ancho2=new JLabel("Alto:");
        ancho2.setBounds(1000,250,100,30);
        add(ancho2);
        textfield3=new JTextField();
        textfield3.setBounds(1000,275,100,20);
        add(textfield3);
        
        alto2=new JLabel("Ancho:");
        alto2.setBounds(1000,300,100,30);
        add(alto2);
        textfield4=new JTextField();
        textfield4.setBounds(1000,325,100,20);
        add(textfield4);
        
        botonobst=new JButton("Aceptar");
        botonobst.setBounds(1000,350,100,30);
        add(botonobst);
        botonobst.addActionListener(this);
        
        //Controla la selección de los 4 algoritmos
        algoritmo= new JLabel("Algoritmo");
        algoritmo.setBounds(1000,375,100,30);
        add(algoritmo);
        alg1=new JRadioButton("A Ciegas",false);
        alg1.setBounds(1000,400,100,20);
        add(alg1);
        alg2=new JRadioButton("Normal",false);
        alg2.setBounds(1000,425,100,20);
        add(alg2);
        alg3=new JRadioButton("Euclidea",false);
        alg3.setBounds(1000,450,100,20);
        add(alg3);
        alg4=new JRadioButton("Máxima",false);
        alg4.setBounds(1000,475,100,20);
        add(alg4);
        check=new JCheckBox("Paso a Paso",false);
        check.setBounds(1000,500,100,20);
        add(check);
        botonrecorrer=new JButton("Recorrer");
        botonrecorrer.setBounds(1000,550,75,30);
        add(botonrecorrer);
        botonrecorrer.addActionListener(this);
        
        //Controla la probabilidad de obstáculos que tendrá el laberintoLoco
        porcent= new JLabel("Probabilidad de obstáculos");
        algoritmo.setBounds(1200,25,100,30);
        add(algoritmo);
        porcen1=new JRadioButton("20%",false);
        porcen1.setBounds(1200,50,100,20);
        add(porcen1);
        porcen2=new JRadioButton("50%",false);
        porcen2.setBounds(1200,75,100,20);
        add(porcen2);
        porcen3=new JRadioButton("70%",false);
        porcen3.setBounds(1200,100,100,20);
        add(porcen3);
        
        //Botones que se encargan de cargar o salvar el fichero
        botonimportar=new JButton("Importar");
        botonimportar.setBounds(1000,625,100,30);
        add(botonimportar);
        botonimportar.addActionListener(this);
        
        botonexportar=new JButton("Exportar");
        botonexportar.setBounds(1000,675,100,30);
        add(botonexportar);
        botonexportar.addActionListener(this);
        
        //Botón que hace salir de la aplicación
        botonsalir=new JButton("Salir");
        botonsalir.setBounds(1200,650,75,30);
        add(botonsalir);
        botonsalir.addActionListener(this);

        //Menu del tablero
        mb=new JMenuBar();
        this.setJMenuBar(mb);
        menu1=new JMenu("Opciones");
        mb.add(menu1);
        
        menu4=new JMenu("Fichero");
        menu1.add(menu4);        
        //Botones
                
        mi6=new JMenuItem("Abrir Fichero");
        menu4.add(mi6);
        mi6.addActionListener(this);
        mi61=new JMenuItem("Guardar Fichero");
        menu4.add(mi61);
        mi61.addActionListener(this);

            setVisible(true);

    }
    //Muestra los nodos visitados
    void dibujarVisitado(Node n) {
        int fil = n.getRow();
        int col = n.getCol();
        l[fil][col].setText("1");
        l[fil][col].setForeground(Color.red); 
    }
    
    //Definir coordenadas en la pantalla para poner obstaculo
        public void dibujarObstaculo(Node n,int numR, int numC) {
                int x3 = n.coordX;
                int x4 = n.coordY;
                for(int i=0;i<numR;i++) {
                for(int j=0;j<numC;j++)
                {
                        l[x3][x4].setForeground(Color.black); 
                        l[x3][x4].setText("X");
                        
                }
        }
    }
        
        public void crearTabla(int numR, int numC) {
                board = new Board(numR, numC); //-------------------------------------
                
                // crea espacios en blanco en el JLabel para que luego quepa el dibujo del tablero
                l = new JLabel[numR][numC];
        for(int i = 0; i < numR ; i++) {
            for(int j = 0; j < numC; j++) {
                l[i][j] = new JLabel();
                l[i][j].setBounds(20 + i * 20, 50 + j * 20 , 20, 20);
                add(l[i][j]);
            }
        }
        }
        //Muestra el laberintoLoco
        int obsRand = 5;
        public void mostrarTabla(int numR, int numC,int obsRand)
        {
        //muestra el tablero, obsRand es el número del rango entre 0 y ese número en el que 
        //es probable que haya un 0
                for(int i=0;i<numR;i++) {
                for(int j=0;j<numC;j++)
                {
                        l[i][j].setForeground(Color.blue);
                        l[i][j].setText("O");
                        //board.setNode(i,  j, new Node(c)
                        
                        int a=(int)(Math.random()*obsRand);
                        if (a==0) {
                    
                    dibujarObstaculo(new Node(i, j), numR, numC);
                    board.crearObstaculo(i, j); //-------------------------------------
                        }
                else
                {
                        l[i][j].setForeground(Color.blue); 
                    l[i][j].setText("O");
                }
                }
        }
      
                
                //esto es una spaguetillada  //-------------------------------------
                board.setIniNode(new Node(0, 0));
                board.setEndNode(new Node(board.numRows - 1, board.numCols - 1));
                l[numR-1][numC-1].setForeground(Color.green); 
                l[numR-1][numC-1].setText("M");
                l[0][0].setForeground(Color.green); 
        l[0][0].setText("S");
        System.out.println(board);
    }
        
    //Se encarga de la pulsación de botones e introducción de datos por pantalla 
    public void actionPerformed(ActionEvent e) 
    {
        //Al pulsar el botón crear y habiendo datos por teclado pertenecientes a fila y columna
        //se crea la tabla con esas dimensiones y la muestra
        if (e.getSource()==botoncrear){
                int x1=Integer.parseInt(textfield1.getText());
            int x2=Integer.parseInt(textfield2.getText());
            crearTabla(x1, x2);
            mostrarTabla(x1,x2,obsRand);
            
        }
        //Al pulsar el botón aceptar y habiendo datos por teclado pertenecientes a fila y columna
        //se crea un obstáculo en esa coordenada
        if (e.getSource()==botonobst){                  
                int x3=Integer.parseInt(textfield3.getText());
            int x4=Integer.parseInt(textfield4.getText());
            dibujarObstaculo(new Node(x3, x4),x3, x4);
        }
        //Al pulsar el boton recorrer si hay solución comienza a mostra la solución paso a paso 
        //o instantáneamente
        
        if (e.getSource()==botonrecorrer){
    //          System.out.println(nodeStack.size());
/*              if (!nodeStack.empty()) {
                        Node n = nodeStack.pop();
                        this.dibujarVisitado(n);
                        System.out.println("BOARD: " + board);
                }*/
        }
        //Botón de importar un fichero
        
        if (e.getSource()==botonimportar)
        {

                JTextArea areaTexto = new JTextArea();
                JFileChooser fileChooser = new JFileChooser();
                int seleccion = fileChooser.showOpenDialog(areaTexto);
                //board.loadFromFile(seleccion);
        }
        
        //Botón de exportar laberintoLoco generado en un determinado fichero
        if (e.getSource()==botonexportar)
        {
                
        }
        //Botón para salir de la aplicación
        if (e.getSource()==botonsalir)
        {
                System.exit(0);
        }
        
    /*    if (e.getSource()==mi7) {
            salida=false;
            System.out.println(board);
            if (!board.blindSearch(board.endNode))
                botonrecorrer.setText("NoSOL");
                                
            if (salida)
                setTitle("tiene salida");
            else
                setTitle("no tiene salida");  
            //MostrarLista();
        }*/

        //Según el algoritmo elegido, al pulsar el botón recorrer comienza a mostra 
        //la solución paso a paso o instantáneamente
        if ((alg2.isSelected()== true)&&(e.getSource()==botonrecorrer)) {
                llamarClimbingSearch(0);
        }
        if ((alg3.isSelected()== true)&&(e.getSource()==botonrecorrer)) {
                llamarClimbingSearch(1);  
        }
        if ((alg4.isSelected()== true)&&(e.getSource()==botonrecorrer)) {
                llamarClimbingSearch(2);
        }
    }
    
    void llamarClimbingSearch(int k) {
        salida=false;
                System.out.println("aki");
      
            if (!board.climbingSearch(board.endNode, k))
                botonrecorrer.setText("NoSOL");                 
                        //System.out.println("Size: " + nodeStack.size());
        
        if (salida)
            setTitle("tiene salida");
        else
            setTitle("no tiene salida");  
        
    }
    

}