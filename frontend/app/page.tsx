import Image from "next/image";

async function getUsers() {
  const res = await fetch("http://localhost:8000/api/users", {
    cache: "no-store",
  });
  if (!res.ok) throw new Error("Erreur lors du chargement des utilisateurs");
  return res.json();
}

export default async function Home() {
  const users = await getUsers();
  return (
    <>
      <h1>Liste des utilisateurs</h1>
      <ul>
        {users.map((user: any) => (
          <li key={user.id}>{user.name}, {user.age} : {user.email}</li>
        ))}
      </ul>
    </>
  );
}
