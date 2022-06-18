<?php
    require_once 'controllers./Conexao.php';
    class Crud extends Conexao{
        private $tabela;
        private $dados;
        private $conexao;
        private $sql;
       

      
        public function login($tabela, array $dados){
            $this->conexao = $this->conectar();
            $this->dados=$dados;
            $where='';
            foreach($this->dados as $coluna => $valor){
                $where .= "$coluna='$valor' and ";
            }
            $where=rtrim($where,'and ');
            $where=" WHERE ".$where;
             $this->sql="SELECT*FROM $tabela $where";
            $exe=$this->conexao->query($this->sql);
            //$sql_query = $mysqli ->query($sql_code) 
            return $exe;

        }


        public function list($tabela){
            $this->conexao =$this->conectar();
            $this->sql="SELECT*FROM aluno";
            $exe=$this->conexao->query($this->sql) or die ("Falha na execução do código SQL: ".$this-> sql ->error);
            //$sql_query = $mysqli ->query($sql_code) 
            return $exe;

        }
        public function list2($id){
            $this->conexao =$this->conectar();
            $this->sql="SELECT presenca.*, materia.* FROM presenca inner join materia on materia.codigo=presenca.codigo_materia where id_aluno=$id ;";
            $exe=$this->conexao->query($this->sql) or die ("Falha na execução do código SQL: ");
            //$sql_query = $mysqli ->query($sql_code) 
            return $exe;

        }
        public function chamada($tabela,$tabela2,$id){
            $this->conexao =$this->conectar();
            $this->sql="SELECT*FROM $tabela inner join $tabela2 where id_aluno=$id;";
            $exe=$this->conexao->query($this->sql) or die ("Falha na execução do código SQL: ");
            //$sql_query = $mysqli ->query($sql_code) 
            return $exe;

        }
        public function upluno(array $dados,$where,$where2){
            $this->conexao =$this->conectar();
            $this->dados=$dados;
            $SET='';
            foreach($this->dados as $key=>$values){
                $SET .="$key=$values,";
            }
            $SET=rtrim($SET,',');

            $this->sql="UPDATE presenca SET $SET WHERE id_aluno=$where and codigo_materia=$where2;";
            $exe=$this->conexao->query($this->sql) ;
            return $exe;

        }
        public function upluno7(array $dados,$where,$where2){
            $this->conexao =$this->conectar();
            $this->dados=$dados;
            $SET='';
            foreach($this->dados as $key=>$values){
                $SET .="$key=$values,";
            }
            $SET=rtrim($SET,',');

            $this->sql="UPDATE presenca SET $SET WHERE id_aluno=$where and codigo_materia=$where2;";
            $exe=$this->conexao->query($this->sql) ;
            return $exe;

        }

        public function upluno2($id,$id2,$id3,$where,$where2){
            $this->conexao =$this->conectar();

            $this->sql="UPDATE presenca SET id_aluno=$id, codigo_materia=$id2, frequencia=$id3 WHERE id_aluno=$where and codigo_materia=$where2;";
            $exe=$this->conexao->query($this->sql) ;
            return $exe;

        }
        public function upluno3($id,$id2,$id3,$where,$where2){
            $this->conexao =$this->conectar();

            $this->sql="UPDATE presenca SET id_aluno=$id, codigo_materia=$id2, notas=$id3 WHERE id_aluno=$where and codigo_materia=$where2;";
            $exe=$this->conexao->query($this->sql) ;
            return $exe;

        }
        public function listaAlunoecod($instancia,$instancia2){
            $this->conexao =$this->conectar();
            $this->sql="SELECT*FROM presenca INNER JOIN aluno ON id=id_aluno  INNER JOIN  materia  ON codigo_materia=codigo WHERE nome_materia='$instancia' and nome='$instancia2';";
            $exe=$this->conexao->query($this->sql) or die ("Falha na execução do código SQL: ");
            return $exe;
        }

        public function listaDisciplina($instancia){
            $this->conexao =$this->conectar();

            $this->sql="SELECT*FROM materia INNER JOIN professor ON id=id_professor WHERE id=$instancia;";
            $exe=$this->conexao->query($this->sql) or die ("Falha na execução do código SQL: ");
            return $exe;
        }
        public function listaAluno($instancia){
            $this->conexao =$this->conectar();
            $this->sql="SELECT*FROM presenca INNER JOIN aluno ON id=id_aluno  INNER JOIN  materia  ON codigo_materia=codigo WHERE nome_materia='$instancia';";
            $exe=$this->conexao->query($this->sql) or die ("Falha na execução do código SQL: ");
            return $exe;
        }
        public function listexe($tabela){
            $this->conexao =$this->conectar();
            $this->sql="SELECT*FROM aluno WHERE nome='$tabela';";
            $exe=$this->conexao->query($this->sql);
            //$sql_query = $mysqli ->query($sql_code) 
            return $exe;

        }
                
    }
?>